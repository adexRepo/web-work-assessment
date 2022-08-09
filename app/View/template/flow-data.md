

FLOW STEP 1 (Morning)_Step1_Get_Collection Data From MIS
# Download file csv from mis
    sftp kebhq1@192.168.87.62:/eaiftp/collect/*${DT}*.csv ./
    #  hq1.#!
    masukk ke cd /data01/MISFILES
# Making Rclips Input
    ambil dari /data01/MISFILES
    masukk ke /data02/nice/batch/file/input
    di checkking2 lagi dipindahin ke cd /data01/hopes/shareDir/MART  
    dan khusus rclipsfile masukke /hopes/shareDir/CL/rclips [kyknya wkwkw]

# batch pre collection batch caller  // caller  [batch][khusus account pre deliquency]
# batch pre execute collection batch // running [batch][khusus account pre deliquency]

# Rclipse 
    ambil sftp clctadm@10.254.184.32 (AP1) /hopes/shareDir/CL/rclips 
    [proses disini yang tadi gagal, move dari 10.254.184.32 to 10.254.184.36]
    masukkin ke 10.254.184.36 (Rclips) /data02/nice/batch/file/input
    data input itu di run
    lalu 
    masukk ke /data02/nice/batch/file/outpus

# issue pagi ini
saya check di kebhq1@192.168.87.62: (mis)  /eaiftp/collect/         --> ada
saya check di 10.254.184.32 (AP1)  data01/hopes/shareDir/CL/rclips --> ada
saya check di 10.254.184.36 (Rclips) /data02/nice/batch/file/input --> tidak ada
