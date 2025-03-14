<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            ['nama_dosen' => 'NOOR AINA', 'nidn' => '1121098603', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ADITHEA SYAPUTRA PERDANA', 'nidn' => '1105069401', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ANNISA', 'nidn' => '1124108201', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'FITRI WULANDARI', 'nidn' => '1111068401', 'prodi_id' => 1, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HUMAIROH RAZAK', 'nidn' => '1115018601', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD ALFRENO RIZANI', 'nidn' => '1125099401', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'SRI RAHAYU', 'nidn' => '1115098101', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ERLINA FATMASARI', 'nidn' => '1116088803', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUSTIKA MUTHAHARAH', 'nidn' => '1123039101', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NITA TRIADISTI', 'nidn' => '1104048201', 'prodi_id' => 2, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RAUDATUL PATIMAH', 'nidn' => '1126128703', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ROSA RIAUWATI', 'nidn' => '1114018701', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'ANDIKA', 'nidn' => '1110068601', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 2],
            ['nama_dosen' => 'ARIS PURWANTO', 'nidn' => '1120128902', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DEDI HARTANTO', 'nidn' => '1107108502', 'prodi_id' => 3, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HAYATUS SA`ADAH', 'nidn' => '1107019501', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HENDERA', 'nidn' => '1128108403', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HERDA ARIYANI', 'nidn' => '1129109001', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'IRFAN ZAMZANI', 'nidn' => '1126029201', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ISLAN NOR', 'nidn' => '1117109501', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'JIHAN', 'nidn' => '1118038806', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'JOKO PRIYANTO WIBOWO', 'nidn' => '1106128402', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MI\'RAJUNNISA', 'nidn' => '1123019302', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOR LATIFAH', 'nidn' => '1111079401', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RAHMAWATI', 'nidn' => '1130039002', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RATIH PRATIWI SARI', 'nidn' => '1124098903', 'prodi_id' => 3, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RETNA EKA DEWI', 'nidn' => '1114039002', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RISA AHDYANI', 'nidn' => '1119029301', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RISYA MULYANI', 'nidn' => '1122038301', 'prodi_id' => 3, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RIZKA MULYA MIRANTI', 'nidn' => '1128018702', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SITI NASHIHAH', 'nidn' => '1126098603', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'TUTY MULYANI', 'nidn' => '1130048701', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'TYAS SETIA NUGRAHA', 'nidn' => '1123038901', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YULIANITA PRATIWI INDAH LESTARI', 'nidn' => '1109079203', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'RUDY ANSARI', 'nidn' => '1112068401', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AYU AHADI NINGRUM', 'nidn' => '1103029002', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'FINKI DONA MARLENY', 'nidn' => '1126038901', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'IHDALHUBBI MAULIDA', 'nidn' => '1130099001', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'KAMARUDIN', 'nidn' => '1129097901', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            // Karena bukan dosen tetap
            // ['nama_dosen' => 'MUHAMMAD ZIKI ELFIRMAN', 'nidn' => '1109098501', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            // ['nama_dosen' => 'MUKHAIMY GAZALI', 'nidn' => '1126107902', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NAHDI SAUBARI', 'nidn' => '1108109102', 'prodi_id' => 4, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'WINDARSYAH', 'nidn' => '1104078601', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'MIRAWATI', 'nidn' => '1119059103', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AFIATUN RAHMAH', 'nidn' => '1127099102', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RIZKI AMALIA', 'nidn' => '1114108901', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SITI MARIA ULFA', 'nidn' => '1111048802', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ZAIYIDAH FATHONY', 'nidn' => '1111017901', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'RR. SRI NURIATY MASDIPUTRI', 'nidn' => '1131059801', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'FIKA AULIA', 'nidn' => '1101078701', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MAHFUZHAH DESWITA PUTERI', 'nidn' => '1101129301', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NELLY MARIATI', 'nidn' => '1127078301', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SURYATI', 'nidn' => '1127047301', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'WULANDARI', 'nidn' => '1106108405', 'prodi_id' => 6, 'status' => 'Nonaktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'ROHNI TAUFIKA SARI', 'nidn' => '1130078303', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DEWI SETYA PARAMITHA', 'nidn' => '1104118801', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'LINDA', 'nidn' => '1110118403', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOOR AMALIAH', 'nidn' => '1103108503', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SUCI FITRI RAHAYU', 'nidn' => '1109058902', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YULIANI BUDIYARTI', 'nidn' => '1124077701', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ZAQYYAH HUZAIFAH', 'nidn' => '1124128401', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'IZMA DAUD', 'nidn' => '1116068402', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DESSY HADRIANTI', 'nidn' => '1112128504', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DEWI KARTIKA WULANDARI', 'nidn' => '1123048901', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DIAH RETNO WULAN', 'nidn' => '1117038902', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ESME ANGGERIYANE', 'nidn' => '1131129002', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HERMAN ARIADI', 'nidn' => '1125078701', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HIRYADI', 'nidn' => '1103117701', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'JENNY SAHERNA', 'nidn' => '1130018602', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'KRISTINA YUNIARTI', 'nidn' => '1118068101', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'LUKMAN HARUN', 'nidn' => '1127108503', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'M FAHRIN AZHARI', 'nidn' => '1127038803', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MIRA', 'nidn' => '1128128601', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD ANWARI', 'nidn' => '1121118801', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD RA\'UF', 'nidn' => '1118018601', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD SYAFWANI', 'nidn' => '1110097101', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHSININ', 'nidn' => '1105097301', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUTHMAINNAH', 'nidn' => '1131018601', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOR AFNI OKTAVIA', 'nidn' => '1101059001', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOVIA HERIANI', 'nidn' => '1106118802', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RUSLINAWATI', 'nidn' => '1107097801', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SOLIKIN', 'nidn' => '1129077901', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'UNI AFRIYANTI', 'nidn' => '1128048601', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YENNY OKVITA SARI', 'nidn' => '1116108301', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YURIDA OLVIANI', 'nidn' => '1120088301', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YUSTAN AZIDIN', 'nidn' => '1130077901', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 1],

            // Magister Perawat
            ['nama_dosen' => 'AHMAD JULIADI', 'nidn' => '1103078701', 'prodi_id' => 9, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'BENING PRAWITA SARI', 'nidn' => '1109038601', 'prodi_id' => 9, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD ANSHARI', 'nidn' => '1115106701', 'prodi_id' => 9, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NURHIKMAH', 'nidn' => '1121047101', 'prodi_id' => 9, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SRI SUNDARI', 'nidn' => '1117118503', 'prodi_id' => 9, 'status' => 'Nonaktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'ALIT SUWANDEWI', 'nidn' => '1102058802', 'prodi_id' => 10, 'status' => 'Aktif', 'jabatan_id' => 1], // Kaprodi Baru anestesi agar program berjalana
            ['nama_dosen' => 'HANURA APRILIA', 'nidn' => '1123048501', 'prodi_id' => 10, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'AKHMAD SYAKIR', 'nidn' => '1102019001', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ISTIQAMAH', 'nidn' => '1103029101', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'JAMIATUL HAMIDAH', 'nidn' => '1105078501', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'M. RIDHA ANWARI', 'nidn' => '1103019003', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD YUNUS', 'nidn' => '1101018903', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NGALIMUN', 'nidn' => '1120018002', 'prodi_id' => 11, 'status' => 'Nonaktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'MIFTAH AL FARHAN', 'nidn' => '1114029801', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AHMAD KAILANI', 'nidn' => '1104048401', 'prodi_id' => 12, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DINA RAFIDIYAH', 'nidn' => '1113067101', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HAFIZHATU NADIA', 'nidn' => '1102018501', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOOR AIDA AFLAHAH', 'nidn' => '1126069202', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'TENNY MURTININGSIH', 'nidn' => '1101067302', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'YANSYAH', 'nidn' => '1113048901', 'prodi_id' => 12, 'status' => 'Nonaktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'MUHAMMAD ABDAN SYAKURA', 'nidn' => '1124128803', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ANWAR ZAIN', 'nidn' => '1127099101', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'FIRDHA HAYATI', 'nidn' => '1107119501', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HERMAN TAUFIK', 'nidn' => '1106088804', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD YUSUF', 'nidn' => '1121127802', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD ZULKARNAEN', 'nidn' => '1107069002', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOOR BAITI', 'nidn' => '1109089501', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'USWATUN NISA', 'nidn' => '1127039501', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'IIN ARIYANTI', 'nidn' => '1111059201', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AHMAD LAZWARDI', 'nidn' => '1110088901', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RAHMATYA NURMEIDINA', 'nidn' => '1119059102', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ARIF GANDA NUGROHO', 'nidn' => '1118048601', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'FITHRIA ULFAH', 'nidn' => '1129039401', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'SORAYA DJAMILAH', 'nidn' => '1129079301', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 1],

            // Profesi Bidan
            ['nama_dosen' => 'BARDIATI ULFAH', 'nidn' => '1116057401', 'prodi_id' => 15, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DARMAYANTI WULANDATIKA', 'nidn' => '1117019001', 'prodi_id' => 15, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'PRATIWI PUJI LESTARI', 'nidn' => '1129109201', 'prodi_id' => 15, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'ELMAN NAFIDZI', 'nidn' => '1116128901', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AISYA FARINA', 'nidn' => '1121059501', 'prodi_id' => 16, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DEWI MAHARANI', 'nidn' => '104048501', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'IKHWATUN HASANAH', 'nidn' => '1102068301', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'KHABIB MUSTHOFA', 'nidn' => '1125059601', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MASRINA', 'nidn' => '1116069201', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'ANDI ACHMAD PRIYADHARMA', 'nidn' => '1101098301', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DIENNY REDHA RAHMANI', 'nidn' => '1108048704', 'prodi_id' => 17, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'HANNY MARIA CAESARINA', 'nidn' => '1108038301', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'KIKY PERMANA SETIAWAN', 'nidn' => '1121028703', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MIFTAHUL RIDHONI', 'nidn' => '1117029201', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD YUSUF RIDHANI', 'nidn' => '1129059001', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'EVY NOORHASANAH', 'nidn' => '1102058301', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ANITA AGUSTINA', 'nidn' => '1108088702', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DEWI NURHANIFAH', 'nidn' => '1122048301', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ERA WIDIA SARY', 'nidn' => '1119128901', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ICA LISNAWATI', 'nidn' => '1111068602', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'JULIANTO', 'nidn' => '1106078502', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MARIANI', 'nidn' => '1120058903', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'METI AGUSTINI', 'nidn' => '1131089001', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MILASARI', 'nidn' => '1121088901', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOOR KHALILATI', 'nidn' => '1109058501', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'NOR ISNA TAUHIDAH', 'nidn' => '1101128901', 'prodi_id' => 18, 'status' => 'Nonaktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RIDA\' MILLATI', 'nidn' => '1106028602', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ROLY MARWAN MATHURIDY', 'nidn' => '1112028401', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1], // Kaprodi Anestesi yang lama, tetapi merangkap jadi tidak digunakan agar program berjalan
            ['nama_dosen' => 'YOSRA SIGIT PRAMONO', 'nidn' => '1116088901', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'FIKRIE', 'nidn' => '1127029101', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AKHMAD RIFANDI', 'nidn' => '1105039202', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ALFIAN MAURICEFLE', 'nidn' => '1105117402', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'AZIZA FITRIAH', 'nidn' => '1130068401', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'CERIA HERMINA', 'nidn' => '1131088301', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'DYTA SETIAWATI HARIYONO', 'nidn' => '1123128602', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'GHEA AMALIA ARPANDY', 'nidn' => '1127128901', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'LITA ARIANI', 'nidn' => '1108048702', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RISNA FEBRIANI', 'nidn' => '1108029401', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'RIZQI AMALIA APRIANTY', 'nidn' => '1108038902', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 1],

            ['nama_dosen' => 'DYAH PRADHITYA HARDIANI', 'nidn' => '1113028902', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'EKAWATI LAILY RAMADHANI', 'nidn' => '1119039301', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'ELIA ANGGARINI', 'nidn' => '1102118902', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'EMMA RUHAIDANI', 'nidn' => '1102028502', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'IRWANDY MUZAIDI', 'nidn' => '1109058901', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
            ['nama_dosen' => 'MUHAMMAD FITRIANSYAH', 'nidn' => '1102038801', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 1],
        ]);

        // Data dosen Berjabatan baru yang akan ditambahkan
        // $newLecturers = [
        //     ['nama_dosen' => 'NOOR AINA', 'nidn' => '1121098603', 'prodi_id' => 1, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'SRI RAHAYU', 'nidn' => '1115098101', 'prodi_id' => 2, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'ANDIKA', 'nidn' => '1110068601', 'prodi_id' => 3, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'RUDY ANSARI', 'nidn' => '1112068401', 'prodi_id' => 4, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'MIRAWATI', 'nidn' => '1119059103', 'prodi_id' => 5, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'RR. SRI NURIATY MASDIPUTRI', 'nidn' => '1131059801', 'prodi_id' => 6, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'ROHNI TAUFIKA SARI', 'nidn' => '1130078303', 'prodi_id' => 7, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'IZMA DAUD', 'nidn' => '1116068402', 'prodi_id' => 8, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     // Magister Perawat
        //     ['nama_dosen' => 'ALIT SUWANDEWI', 'nidn' => '1102058802', 'prodi_id' => 10, 'status' => 'Aktif', 'jabatan_id' => 2], // Kaprodi Baru anestesi agar program berjalana
        //     ['nama_dosen' => 'AKHMAD SYAKIR', 'nidn' => '1102019001', 'prodi_id' => 11, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'MIFTAH AL FARHAN', 'nidn' => '1114029801', 'prodi_id' => 12, 'status' => 'Aktif', 'jabatan_id' => 2,],
        //     ['nama_dosen' => 'MUHAMMAD ABDAN SYAKURA', 'nidn' => '1124128803', 'prodi_id' => 13, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'IIN ARIYANTI', 'nidn' => '1111059201', 'prodi_id' => 14, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     // Profesi Bidan
        //     ['nama_dosen' => 'ELMAN NAFIDZI', 'nidn' => '1116128901', 'prodi_id' => 16, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'ANDI ACHMAD PRIYADHARMA', 'nidn' => '1101098301', 'prodi_id' => 17, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'EVY NOORHASANAH', 'nidn' => '1102058301', 'prodi_id' => 18, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'FIKRIE', 'nidn' => '1127029101', 'prodi_id' => 19, 'status' => 'Aktif', 'jabatan_id' => 2],
        //     ['nama_dosen' => 'DYAH PRADHITYA HARDIANI', 'nidn' => '1113028902', 'prodi_id' => 20, 'status' => 'Aktif', 'jabatan_id' => 2],
            
        //     // Tambahkan dosen lainnya sesuai kebutuhan
        // ];

        // foreach ($newLecturers as $lecturer) {
        //     // Membuat entri di tabel users
        //     $userId = DB::table('users')->insertGetId([
        //         'username' => $lecturer['nidn'],
        //         'password' => bcrypt($lecturer['nidn']), // Enkripsi password
        //         'role' => 'dosenberjabatan',
        //     ]);

        //     // Menambahkan data dosen baru
        //     DB::table('dosen')->insert([
        //         'nama_dosen' => $lecturer['nama_dosen'],
        //         'nidn' => $lecturer['nidn'],
        //         'prodi_id' => $lecturer['prodi_id'],
        //         'status' => $lecturer['status'],
        //         'jabatan_id' => $lecturer['jabatan_id'],
        //         'users_id' => $userId, // Menggunakan ID pengguna yang baru dibuat
        //     ]);
        // }
    }
}
