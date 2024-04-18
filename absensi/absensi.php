<?php include '../header.php'; ?>
   <div class="container">
        
                            
                            <div class="card-header"><br>
                                    <h3 class="text-center" >Data Absensi Siswa</h3>
                                    <!-- <button onclick="location.href='add_rfid.php'" class="btn btn-primary float-right">Add</button> -->
                                </div><br>
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div><div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="display responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Status</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include 'getdataabsensi.php'; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/adminlte@3.1.0/dist/js/adminlte.min.js"></script>
     -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            responsive: true
        });
    </script>
<!-- </div>
    </div>
</body>
</html> -->
