# web.work_assessment
Task College Create Web Application - Work_Assessment S-6 

## WORK_EVALUATION ##

# FLOW_BUSSINES #
1. Dapat Login berdasarkan authority
    a. login sebagai kurir       => untuk user biasa >> kurir
    b. login sebagai koordinator => untuk user supervisor >> koordinator
    c. login sebagai korwil      => untuk programmer dan korwil

2. Dashboard
    if auth_user == spv || auth_user == adm
        tampilkan productifity chart
            kategori kuisioner nya
        tampilkan Grid/table bawahan
            bawahan spv adalah kyn
            bawahan adm adalah spv dan kyn
        tampilkan productifity Diri
    else >> driver
        berita : info_isi_survey_produktifitas >> tap >> screen / tampilan kuisioner nya
        tampilkan productifity Diri

3. create template
    cuman ditampilkan di auth_user spv dan adm saja

4. isi kuisioner berdasarkan template
    

# DATABASE_STRUKTUR #
1. nama table = user_base
        | FIELD NAME        | data Type(sz) | Remark
    a.  | user_id           | number(8)     | [PK][generate]
    b.  | name              | varchar(50)   | [-][-]
    b.  | gender            | varchar(1)    | [FK][code_base : type: gender] [Laki-laki : L , Perempuan : P][]
    c.  | status            | varchar(1)    | [FK][code_base : type: stsKerja] [Kerja/active : 1 , Resign : 0][]
    d.  | auth_user/jabatan | varchar(3)    | [FK][code_base : type: jabatan] [Manager : adm   , Supervisor : spv , driver : kyn][]
    e.  | group             | varchar(10)   | [FK][code_base : type: group]
    f.  | departement       | varchar(10)   | [FK][code_base : type: dept]
    g.  | branch_id         | varchar(15)   | [FK][code_base : type: branch]
    h.  | password          | MD5(32)       | [-][encode]
    i.  | date_regist       | dateTime(15)  | [-][-]
    j.  | date_updated      | dateTime(15)  | [-][-]
    h.  | Contract          | varchar(1)    | [FK][code_base : type: contractKerja] [0 :  Contract , 1 : Karyawan tetap][]
    i.  | last_contract     | dateTime(15)  | [-][20220723_020440 or null]

    contoh : 
        const user = [
            {
                user_id         : 00000001,
                name            : Adek1,
                gender          : L,
                status          : 1,
                auth_user       : Manager ,
                departement     : Distribusi,
                branch_id       : jaktim01,
                password        : ksajdoiq@$12ioh40891,
                date_regist     : 20220723_020440,
                date_updated    : 20220723_020440,
                Contract        : 1,
                last_contract   : null,
            },
            {
                user_id         : 00000002,
                name            : Adek 2,
                gender          : L,
                status          : 1,
                auth_user       : spv ,
                departement     : Distribusi,
                branch_id       : jaktim01,
                password        : ksajdoiq@$12ioh40891,
                date_regist     : 20220723_020440,
                date_updated     : 20220723_020440,
                Contract        : 0,
                last_contract   : 20221223_020440
            },
            {
                user_id         : 00000003,
                name            : Adek 2,
                gender          : L,
                status          : 1,
                auth_user       : kyn ,
                jabatan         : driver,
                departement     : Distribusi,
                branch_id       : jaktim01,
                password        : ksajdoiq@$12ioh40891,
                date_regist     : 20220723_020440,
                date_updated     : 20220723_020440,
                Contract        : 0,
                last_contract   : 20231223_020440
            },
        ]

2. nama table = code_base
        | FIELD NAME        | data Type(sz) | Remark
    a.  | type              | varchar(15)   | [PK][from user supervisor or admin]
    b.  | code              | varchar(3)    | [PK][-]
    c.  | code_title        | varchar(25)   | [PK][-]
    d.  | code_name         | varchar(25)   | [PK][-]
    d.  | priority/seqNo    | varchar(25)   | [PK][-]
    f.  | date_regist       | dateTime(15)  | [PK][-]
    g.  | date_updated      | dateTime(15)  | [PK][-]

    contoh : 
        const branch_id = [
            {
                type         : branch_id,
                code         : jaktim01,
                code_title   : Kantor Cabang,
                code_name    : Jaktim Unindra,
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
            },
            {
                type         : branch_id,
                code         : jaktim02,
                code_title   : Kantor Cabang ,
                code_name    : Jaktim pgc,
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
            },
            {
                type         : branch_id,
                code         : jaktim03,
                code_title   : Kantor Cabang,
                code_name    : Jaktim cawang,
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
            },
            {
                type         : contract,
                code         : 0,
                code_title   : Contract Kerja,
                code_name    : Contract,
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
            },
            {
                type         : contract,
                code         : 1,
                code_title   : Contract Kerja,
                code_name    : Permanent,
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
            },
        ]

3. nama table = about_template_kuisioner (trx 1)
        | FIELD NAME        | data Type(sz)     | Remark
    a.  | template_id       | varchar(30)       | [PK][from user supervisor or admin]
    b.  | created_by        | varchar(15)       | [FK][user_id]
    c.  | version           | varchar(15)       | [-][sequence]
    d.  | kategori_template | varchar(15)       | [FK][code_base >> kategoriTemplate]
    e.  | teknik_penilaian  | varchar(15)       | [FK][code_base : type: TPenilaian] [YA/tidak , score , 1,2,3,4][]
    f.  | date_regist       | dateTime(15)      | [-][-]
    g.  | date_updated      | dateTime(15)      | [-][-]
    h.  | kuisioner         | varchar(100000000)| [-][nanti pertanyaan diinsert ke column ini, dijadiin satu, nanti kalo mau dikeluarin tinggal di looping aja]

    contoh :
        const list = [
            {
                temlate_id : sdqq3411
                created_by : 00000001
                version     : 1
                kategori_template : Keselamatan_Kerja
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
                kuisioner : 
                    "
                        Apakah anda mandi terlebih dahulu sebelum mengantar barang ?|
                        Apakah anda mencuci kendaraan anda minimal tiga minggu sekali ?|
                        Apakah anda berpakaian sesuai dengan ketentuan yang sudah ditetapkan perusahaan ?|
                    "
            },
            {
                temlate_id : EQWSQA21
                created_by : 00000001
                version     : 1
                kategori_template : Kebersihan_kerja
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
                kuisioner : 
                    "
                        Apakah anda mandi terlebih dahulu sebelum mengantar barang ?|
                        Apakah anda mencuci kendaraan anda minimal tiga minggu sekali ?|
                        Apakah anda berpakaian sesuai dengan ketentuan yang sudah ditetapkan perusahaan ?|
                    "
            },
            {
                temlate_id : E321WS32
                created_by : 00000001
                version     : 1
                kategori_template : kecepatan_kerja
                date_regist  : 20220723_020440,
                date_updated : 20220723_020440,
                kuisioner : "
                        Apakah anda Sering kesulitan dalam mencari alamat ?|
                        Apakah anda Sering kesulitan dalam mencari alamat ?|
                        Apakah anda Sering kesulitan dalam mencari alamat ?|
                        Apakah anda Sering kesulitan dalam mencari alamat ?|
                    "
            },
        ]

4. nama table = about_boundle_template_kuisioner (trx 2)
        | FIELD NAME        | data Type(sz)  | Remark
    a.  | boundle_id        | varchar(15)    | [PK][]
    c.  | created_by        | varchar(15)    | [FK][user_id]
    d.  | template_id       | varchar(100)   | [-][]
    e.  | date_regist       | date(15)       | [-][]
    f.  | date_updated      | date(15)       | [-][]

    contoh : 
        const list = [
            boundle_id    : dwa12,
            date          : 20220720,
            created_by    : 0000001,
            template_id   : EQWSQA21 | E321WS32,
            date_regist   : 20220723_020440,
            date_updated  : 20220723_020440,
        ]

5. nama table = detail_result_Survey (trx)
        | FIELD NAME        | data Type(sz)  | Remark
    a.  | user_id           | varchar(15)    | [PK][from user supervisor or admin]
    b.  | template_id       | varchar(15)    | [FK][from user supervisor or admin]
    c.  | score             | varchar(15)    | [-][]
    c.  | penilaian_spv     | varchar(15)    | [-][]
    d.  | date_regist       | date(15)       | [-][]
    e.  | date_updated      | date(15)       | [-][]

    const list = [
        {
            user_id       : 001,
            template_id   : EQWSQA21, (TEMPLATE KEBERSIHAN)
            score         : 60,
            date_regist   : 20220723_020440,
            date_updated  : 20220723_020440,
        },
        {
            user_id       : 001,
            template_id   : E321WS32, (TEMPLATE KECEPATAN KERJA)
            score         : 90,
            date_regist   : 20220723_020440,
            date_updated  : 20220723_020440,
        },
    ]

    flow 
    driver dapet notif utk isi kuisioner
    udah diisi >> kalkulasi
    (hasil akhir score) >> masuk ke table detail_result_Survey


6. nama table = final_result
    check produktifitas
        kartap  >> bonus / naik jabatan
        kontrak >> naik ke kartap## WORK_EVALUATION ##

