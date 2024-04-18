#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>  // Library untuk modul RFID MFRC522


const char* ssid = "Pasti Dadi";
const char* password = "bejo0808";
const char* serverAddress = "http://192.168.80.154/pelajar/rfid/saverfid.php";  // Ganti dengan URL skrip PHP Anda
// const char* serverAddress = "http://192.168.80.154/pelajar/rfid/saverfid.php";  // Ganti dengan URL skrip PHP Anda

#define buzzerPin 25  // Pin tempat buzzer terhubung
#define ledPin 2
#define SS_PIN 14
#define RST_PIN 27
#define SDA_PIN 21  // Pin SDA
#define SCL_PIN 22  // Pin SCL
// Pin untuk mengendalikan buzzer
MFRC522 mfrc522(SS_PIN, RST_PIN);  // Sesuaikan dengan pin yang Anda gunakan
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  Serial.begin(115200);
  lcd.init();
  lcd.backlight();

  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, LOW);  // Matikan LED saat awalnya
  SPI.begin();
  mfrc522.PCD_Init();

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
    lcd.setCursor(0, 0);
    lcd.print("Connecting to WiFi!");
  }
  Serial.println("Connected to WiFi");
  lcd.print("Connected to WiFi!");
  delay(1000);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Selamat Datang...");
  delay(1000);
}

void loop() {
  lcd.setCursor(0, 0);
  lcd.print("Tempelkan !!! ");
  lcd.setCursor(0, 1);
  lcd.print("    Kartu...");
  if (!mfrc522.PICC_IsNewCardPresent() || !mfrc522.PICC_ReadCardSerial()) {
    delay(100);
    return;
  }

  String rfidData = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    rfidData += String(mfrc522.uid.uidByte[i], HEX);
  }

  if (sendDataToServer(rfidData)) {

    Serial.println("Data sent successfully.");
    lcd.begin(16, 2);  // Inisialisasi LCD
    lcd.print("  Input Data!");
    lcd.setCursor(0, 1);
    lcd.print("    Daftar RFID...");
    delay(1000);
  } else {

    Serial.println("Failed to send data.");
  }

  mfrc522.PICC_HaltA();
  mfrc522.PCD_StopCrypto1();
  delay(1000);
}

bool sendDataToServer(String rfidData) {
  HTTPClient http;
  http.begin(serverAddress);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  String postData = "rfid=" + rfidData;

  int httpResponseCode = http.POST(postData);
  String responsePayload = http.getString();  // Ambil respons dari server
  http.end();

  Serial.println("Server response: " + responsePayload);



  if (httpResponseCode == 200) {
    analogWrite(buzzerPin, 128);
    digitalWrite(ledPin, HIGH);  // Hidupkan LED
    delay(1000);                 // Bunyikan buzzer selama 500ms detik
    analogWrite(buzzerPin, 0);
    digitalWrite(ledPin, LOW);  // Matikan LED
    delay(1000);                // Tahan selama 500ms (setengah detik)
    lcd.clear();
    return true;
  } else {
    return false;
  }
}
