<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Station;
use App\Models\Directorate;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = array(
            array('id' => '1','name' => 'Chancellor'),
            array('id' => '2','name' => 'Chairperson of the University Council'),
            array('id' => '3','name' => 'Vice Chancellor','short_name' => 'VC','category' => 'Administrative'),
            array('id' => '4','name' => 'Deputy Vice Chancellor Academic, Research and Consultancy','short_name' => 'DVC-ARC','category' => 'Administrative','type' => '2','parent' => '3'),
            array('id' => '5','name' => 'Deputy Vice Chancellor Planning, Finance and Administration','short_name' => 'DVC-PFA','category' => 'Administrative','type' => '2','parent' => '3'),
            array('id' => '6','name' => 'Professor','short_name' => ''),
            array('id' => '7','name' => 'Associate Professor','short_name' => 'Ass Professor'),
            array('id' => '8','name' => 'Senior Lecturer','short_name' => ''),
            array('id' => '9','name' => 'Lecturer','short_name' => ''),
            array('id' => '10','name' => 'Assistant Lecturer','short_name' => ''),
            array('id' => '11','name' => 'Tutorial Assistant','short_name' => 'TA'),
            array('id' => '12','name' => 'System Administrator','type' => '1','parent' => '5'),
            array('id' => '14','name' => 'Principal, Institute of Science and Technology','short_name' => '','organ_id' => '5'),
            array('id' => '15','name' => 'Principal, College of Engineering and Technology','short_name' => '','organ_id' => '2'),
            array('id' => '16','name' => 'Principal, College of Science and Technical Education','short_name' => '','organ_id' => '3'),
            array('id' => '17','name' => 'Dean, School of Humanities and Business Studies','short_name' => '','organ_id' => '6'),
            array('id' => '18','name' => 'Principal, Rukwa-Campus College','short_name' => '','organ_id' => '4'),
            array('id' => '19','name' => 'Head of Department of Business Management','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '17','organ_id' => '21'),
            array('id' => '20','name' => 'Head of Department of Architecture','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '15'),
            array('id' => '21','name' => 'Head of Department of Civil Engineering','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '16'),
            array('id' => '22','name' => 'Head of Department of Computer Engineering','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '17'),
            array('id' => '23','name' => 'Head of Department of Electrical and Electronics','short_name' => '','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '18'),
            array('id' => '24','name' => 'Head of  Department of Mechanical Engineering','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '19'),
            array('id' => '25','name' => 'Head of Department of Science and Business Management','short_name' => '','category' => 'Academic','type' => '2','parent' => '14','organ_id' => '20'),
            array('id' => '26','name' => 'Head of Department Information and Communication Technology','short_name' => '','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '7'),
            array('id' => '28','name' => 'Head Department of Settlement Planning and Designing Technology','short_name' => '','category' => 'Academic','type' => '2','organ_id' => '10'),
            array('id' => '29','name' => 'Head Department of Built Environment and Engineering','short_name' => '','category' => 'Academic','type' => '2','organ_id' => '11'),
            array('id' => '30','name' => 'Head of Department of  Natural Sciences','short_name' => 'HoD','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '12'),
            array('id' => '31','name' => 'Head of Education and Psychology','short_name' => '','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '13'),
            array('id' => '34','name' => 'Head of Health Science and Technology','short_name' => '','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '14'),
            array('id' => '35','name' => 'Head of Electronics and Telecommunication Engineering','short_name' => '','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '8'),
            array('id' => '36','name' => 'Director of Undergraduate Studies','short_name' => 'DUS','directorate_id' => '1'),
            array('id' => '37','name' => 'Director of Postgraduate Studies, Research and Publications','short_name' => '','directorate_id' => '2'),
            array('id' => '38','name' => 'Corporate Counsel'),
            array('id' => '40','name' => 'Director of Library Services','short_name' => '','directorate_id' => '4'),
            array('id' => '42','name' => 'Director of Planning and Development','type' => '2','parent' => '5','directorate_id' => '5'),
            array('id' => '43','name' => 'Director of Finance','type' => '2','directorate_id' => '8'),
            array('id' => '44','name' => 'Chief Internal Auditor','short_name' => 'CIA','category' => 'Administrative','type' => '2','parent' => '3','directorate_id' => '15'),
            array('id' => '45','name' => 'Head of Information, Education and Communication','type' => '2','parent' => '3'),
            array('id' => '46','name' => 'Director of Estates And Technical Services','type' => '2','directorate_id' => '9'),
            array('id' => '47','name' => 'Director of Administration and Human Resource Management','type' => '2','parent' => '5','directorate_id' => '7'),
            array('id' => '48','name' => 'Director of MUST Consultancy Bureau','type' => '2','directorate_id' => '10'),
            array('id' => '49','name' => 'Director of Quality Assurance','type' => '2','parent' => '3','directorate_id' => '12'),
            array('id' => '50','name' => 'Director Centre for Networking and Computing ','type' => '2','parent' => '5','directorate_id' => '11'),
            array('id' => '51','name' => 'Head of Procurement Management Unit','type' => '2','parent' => '3','directorate_id' => '13'),
            array('id' => '52','name' => 'Director of Radio and Television'),
            array('id' => '53','name' => 'Director Technopreneurship Development'),
            array('id' => '54','name' => 'Medical Officer Incharge'),
            array('id' => '55','name' => 'Instructor I','short_name' => ''),
            array('id' => '56','name' => 'Instructor II','short_name' => ''),
            array('id' => '57','name' => 'Senior Instructor I','short_name' => ''),
            array('id' => '58','name' => 'Senior Instructor II','short_name' => ''),
            array('id' => '59','name' => 'Principal Instructor I','short_name' => ''),
            array('id' => '60','name' => 'Principal Instructor II','short_name' => ''),
            array('id' => '61','name' => 'Laboratory Technologist I','short_name' => ''),
            array('id' => '62','name' => 'Laboratory Technologist II','short_name' => ''),
            array('id' => '63','name' => 'Senior Laboratory Technologist I','short_name' => ''),
            array('id' => '64','name' => 'Senior Laboratory Technologist II','short_name' => ''),
            array('id' => '65','name' => 'Principal Laboratory Technologist I','short_name' => ''),
            array('id' => '66','name' => 'Principal Laboratory Technologist II','short_name' => ''),
            array('id' => '67','name' => 'Laboratory Technician I','short_name' => ''),
            array('id' => '68','name' => 'Laboratory Technician II','short_name' => ''),
            array('id' => '69','name' => 'Senior Laboratory Technician I','short_name' => ''),
            array('id' => '70','name' => 'Senior Laboratory Technician II ','short_name' => ''),
            array('id' => '71','name' => 'Principal Laboratory Technician I','short_name' => ''),
            array('id' => '72','name' => 'Principal Laboratory Technician II','short_name' => ''),
            array('id' => '73','name' => 'Cartographic Technician I','type' => '1'),
            array('id' => '74','name' => 'Cartographic Technician II','type' => '1'),
            array('id' => '75','name' => 'Senior Cartographic Technician I','type' => '1'),
            array('id' => '76','name' => 'Senior Cartographic Technician II','type' => '1'),
            array('id' => '77','name' => 'Principal Cartographic Technician I','type' => '1'),
            array('id' => '78','name' => 'Principal Cartographic Technician II','type' => '1'),
            array('id' => '79','name' => 'Transcriber / Sign Interpreter I','type' => '1'),
            array('id' => '80','name' => 'Transcriber / Sign Interpreter II','type' => '1'),
            array('id' => '81','name' => 'Senior Transcriber / Sign Interpreter I','type' => '1'),
            array('id' => '82','name' => 'Senior Transcriber / Sign Interpreter II','type' => '1'),
            array('id' => '83','name' => 'Principal Transcriber / Sign Interpreter I','type' => '1'),
            array('id' => '84','name' => 'Principal Transcriber / Sign Interpreter II','type' => '1'),
            array('id' => '85','name' => 'Planning Officer II ','type' => '1'),
            array('id' => '86','name' => 'Planning Officer I','type' => '1'),
            array('id' => '87','name' => 'Senior Planning Officer I ','type' => '1'),
            array('id' => '88','name' => 'Senior Planning Officer II','type' => '1'),
            array('id' => '89','name' => 'Principal Planning Officer I ','type' => '1'),
            array('id' => '90','name' => 'Principal Planning Officer II','type' => '1'),
            array('id' => '91','name' => 'Legal Officer I','type' => '1'),
            array('id' => '92','name' => 'Legal Officer II','type' => '1'),
            array('id' => '93','name' => 'Senior Legal Officer I ','type' => '1'),
            array('id' => '94','name' => 'Senior Legal Officer II','type' => '1'),
            array('id' => '95','name' => 'Principal Legal Officer I ','type' => '1'),
            array('id' => '96','name' => 'Principal Legal Officer II','type' => '1'),
            array('id' => '97','name' => 'Internal Auditor I','type' => '1'),
            array('id' => '98','name' => 'Internal Auditor II','type' => '1'),
            array('id' => '99','name' => 'Senior Internal Auditor I ','type' => '1'),
            array('id' => '100','name' => 'Senior Internal Auditor II','type' => '1'),
            array('id' => '101','name' => 'Principal Internal Auditor I ','type' => '1'),
            array('id' => '102','name' => 'Principal Internal Auditor II','type' => '1'),
            array('id' => '103','name' => 'Internal Audit Officer I ','type' => '1'),
            array('id' => '104','name' => 'Internal Audit Officer II','type' => '1'),
            array('id' => '105','name' => 'Senior Internal Audit Officer I','type' => '1'),
            array('id' => '106','name' => 'Senior Internal Audit Officer II','type' => '1'),
            array('id' => '107','name' => 'Principal Internal Audit Officer I ','type' => '1'),
            array('id' => '108','name' => 'Principal Internal Audit Officer II','type' => '1'),
            array('id' => '109','name' => 'Accountant I','type' => '1'),
            array('id' => '110','name' => 'Accountant II','type' => '1'),
            array('id' => '111','name' => 'Senior Accountant I ','type' => '1'),
            array('id' => '112','name' => 'Senior Accountant II','type' => '1'),
            array('id' => '113','name' => 'Principal Accountant I ','type' => '1'),
            array('id' => '114','name' => 'Principal Accountant II','type' => '1'),
            array('id' => '115','name' => 'Accounts Officer I ','type' => '1'),
            array('id' => '116','name' => 'Accounts Officer II','type' => '1'),
            array('id' => '117','name' => 'Senior Accounts Officer I','type' => '1'),
            array('id' => '118','name' => 'Senior Accounts Officer II','type' => '1'),
            array('id' => '119','name' => 'Principal Accounts Officer I ','type' => '1'),
            array('id' => '120','name' => 'Principal Accounts Officer II','type' => '1'),
            array('id' => '121','name' => 'Accounts Technician I','type' => '1'),
            array('id' => '122','name' => 'Accounts Technician II','type' => '1'),
            array('id' => '123','name' => 'Senior Accounts Technician I ','type' => '1'),
            array('id' => '124','name' => 'Senior Accounts Technician II','type' => '1'),
            array('id' => '125','name' => 'Principal Accounts Technician I ','type' => '1'),
            array('id' => '126','name' => 'Principal Accounts Technician II','type' => '1'),
            array('id' => '127','name' => 'Supplies Assistant I ','type' => '1'),
            array('id' => '128','name' => 'Assistant Procurement and Supplies Officer II ','type' => '1'),
            array('id' => '129','name' => 'Senior Assistant Procurement and Supplies Officer II ','type' => '1'),
            array('id' => '130','name' => 'Senior Supplies Assistant I ','type' => '1'),
            array('id' => '131','name' => 'Principal Supplies Assistant II','type' => '1'),
            array('id' => '132','name' => 'Principal Supplies Assistant I ','type' => '1'),
            array('id' => '133','name' => 'Procurement and Supplies Officer I ','type' => '1'),
            array('id' => '134','name' => 'Procurement and Supplies Officer II','type' => '1'),
            array('id' => '135','name' => 'Senior Procurement & Supplies Officer I ','type' => '1'),
            array('id' => '136','name' => 'Senior Procurement & Supplies Officer II','type' => '1'),
            array('id' => '137','name' => 'Principal Procurement & Supplies Officer I ','type' => '1'),
            array('id' => '138','name' => 'Principal Procurement & Supplies Officer II','type' => '1'),
            array('id' => '139','name' => 'Communication Officer I','type' => '1'),
            array('id' => '140','name' => 'Communication Officer II','type' => '1'),
            array('id' => '141','name' => 'Senior Communication Officer I ','type' => '1'),
            array('id' => '142','name' => 'Senior Communication Officer II','type' => '1'),
            array('id' => '143','name' => 'Principal Communication Officer I ','type' => '1'),
            array('id' => '144','name' => 'Human resources and administrative Officer I ','type' => '1'),
            array('id' => '145','name' => 'Human resources and administrative Officer II','type' => '1'),
            array('id' => '146','name' => 'Senior Human Resources and Administrative Officer I ','type' => '1'),
            array('id' => '147','name' => 'Senior Human Resources and Administrative Officer II','type' => '1'),
            array('id' => '148','name' => 'Principal Human Resources and Administrative Office I ','type' => '1'),
            array('id' => '149','name' => 'Principal Human Resources and Administrative Office II','type' => '1'),
            array('id' => '150','name' => 'Records Management Assistant I ','type' => '1'),
            array('id' => '151','name' => 'Records Management Assistant II','type' => '1'),
            array('id' => '152','name' => 'Senior Records Management Assistant I','type' => '1'),
            array('id' => '153','name' => 'Senior Records Management Assistant II','type' => '1'),
            array('id' => '154','name' => 'Principal Records Management Assistant I','type' => '1'),
            array('id' => '155','name' => 'Principal Records Management Assistant II','type' => '1'),
            array('id' => '156','name' => 'Records Management Officer I','type' => '1'),
            array('id' => '157','name' => 'Records Management Officer II','type' => '1'),
            array('id' => '158','name' => 'Senior Records Management Officer I ','type' => '1'),
            array('id' => '159','name' => 'Senior Records Management Officer II','type' => '1'),
            array('id' => '160','name' => 'Principal Records Management Officer I','type' => '1'),
            array('id' => '161','name' => 'Principal Records Management Officer II','type' => '1'),
            array('id' => '162','name' => 'Personal Secretary I ','type' => '1'),
            array('id' => '163','name' => 'Personal Secretary II','type' => '1'),
            array('id' => '164','name' => 'Office Management Secretary I ','type' => '1'),
            array('id' => '165','name' => 'Office Management Secretary II','type' => '1'),
            array('id' => '166','name' => 'Executive Assistant I ','type' => '1'),
            array('id' => '167','name' => 'Executive Assistant II','type' => '1'),
            array('id' => '168','name' => 'Driver I ','type' => '1'),
            array('id' => '169','name' => 'Driver II','type' => '1'),
            array('id' => '170','name' => 'Senior Driver I ','type' => '1'),
            array('id' => '171','name' => 'Senior Driver II','type' => '1'),
            array('id' => '172','name' => 'Principal Driver','type' => '1'),
            array('id' => '173','name' => 'Transport Officer I ','type' => '1'),
            array('id' => '174','name' => 'Transport Officer II','type' => '1'),
            array('id' => '175','name' => 'Senior Transport Officer I ','type' => '1'),
            array('id' => '176','name' => 'Senior Transport Officer II','type' => '1'),
            array('id' => '177','name' => 'Principal Transport Officer I ','type' => '1'),
            array('id' => '178','name' => 'Principal Transport Officer II','type' => '1'),
            array('id' => '179','name' => 'Office Assistant I','type' => '1'),
            array('id' => '180','name' => 'Office Assistant II','type' => '1'),
            array('id' => '181','name' => 'Senior Office Assistant I','type' => '1'),
            array('id' => '182','name' => 'Senior Office Assistant II','type' => '1'),
            array('id' => '183','name' => 'Principal Office Assistant I ','type' => '1'),
            array('id' => '184','name' => 'Principal Office Assistant II','type' => '1'),
            array('id' => '185','name' => 'Receptionist I ','type' => '1'),
            array('id' => '186','name' => 'Receptionist II','type' => '1'),
            array('id' => '187','name' => 'Senior Receptionist I ','type' => '1'),
            array('id' => '188','name' => 'Senior Receptionist II','type' => '1'),
            array('id' => '189','name' => 'Principal Receptionist I ','type' => '1'),
            array('id' => '190','name' => 'Principal Receptionist II','type' => '1'),
            array('id' => '191','name' => 'Auxiliary Police Corporal ','type' => '1'),
            array('id' => '192','name' => 'Auxiliary Police Constable ','type' => '1'),
            array('id' => '193','name' => 'Auxiliary Police Sergeant ','type' => '1'),
            array('id' => '194','name' => 'Assistant Auxiliary Police Inspector ','type' => '1'),
            array('id' => '195','name' => 'Auxiliary Police Inspector ','type' => '1'),
            array('id' => '196','name' => 'Assistant Auxiliary Police Superintendent ','type' => '1'),
            array('id' => '197','name' => 'Artisan I ','type' => '1'),
            array('id' => '198','name' => 'Artisan II ','type' => '1'),
            array('id' => '199','name' => 'Senior Artisan I ','type' => '1'),
            array('id' => '200','name' => 'Principal Artisan I ','type' => '1'),
            array('id' => '201','name' => 'ICT Officer I ','type' => '1'),
            array('id' => '202','name' => 'ICT Officer II','type' => '1'),
            array('id' => '203','name' => 'Senior ICT Officer I ','type' => '1'),
            array('id' => '204','name' => 'Senior ICT Officer II','type' => '1'),
            array('id' => '205','name' => 'Principal ICT Officer I ','type' => '1'),
            array('id' => '206','name' => 'Principal ICT Officer II','type' => '1'),
            array('id' => '207','name' => 'ICT Technician I ','type' => '1'),
            array('id' => '208','name' => 'ICT Technician II ','type' => '1'),
            array('id' => '209','name' => 'Senior ICT Technician I','type' => '1'),
            array('id' => '210','name' => 'Senior ICT Technician II','type' => '1'),
            array('id' => '211','name' => 'Principal ICT Technician I ','type' => '1'),
            array('id' => '212','name' => 'Principal ICT Technician II','type' => '1'),
            array('id' => '213','name' => 'Technician I ','type' => '1'),
            array('id' => '214','name' => 'Technician II','type' => '1'),
            array('id' => '215','name' => 'Senior Technician I','type' => '1'),
            array('id' => '216','name' => 'Senior Technician II','type' => '1'),
            array('id' => '217','name' => 'Principal Technician II','type' => '1'),
            array('id' => '218','name' => 'Estates Officer I ','type' => '1'),
            array('id' => '219','name' => 'Estates Officer II','type' => '1'),
            array('id' => '220','name' => 'Senior Estates Officer I','type' => '1'),
            array('id' => '221','name' => 'Senior Estates Officer II','type' => '1'),
            array('id' => '222','name' => 'Principal Estates Officer I ','type' => '1'),
            array('id' => '223','name' => 'Principal Estates Officer II','type' => '1'),
            array('id' => '224','name' => 'Library Assistant I ','type' => '1'),
            array('id' => '225','name' => 'Library Assistant II','type' => '1'),
            array('id' => '226','name' => 'Senior Library Assistant I ','type' => '1'),
            array('id' => '227','name' => 'Senior Library Assistant II','type' => '1'),
            array('id' => '228','name' => 'Principal Library Assistant I ','type' => '1'),
            array('id' => '229','name' => 'Principal Library Assistant II','type' => '1'),
            array('id' => '230','name' => 'Principal Technician I ','type' => '1'),
            array('id' => '231','name' => ' Librarian I ','type' => '1'),
            array('id' => '232','name' => ' Librarian II','type' => '1'),
            array('id' => '233','name' => 'Senior Librarian I ','type' => '1'),
            array('id' => '234','name' => 'Senior Librarian II','type' => '1'),
            array('id' => '235','name' => 'Principal Librarian I ','type' => '1'),
            array('id' => '236','name' => 'Principal Librarian II','type' => '1'),
            array('id' => '237','name' => 'Warden I ','type' => '1'),
            array('id' => '238','name' => 'Warden II','type' => '1'),
            array('id' => '239','name' => 'Senior Warden I ','type' => '1'),
            array('id' => '240','name' => 'Senior Warden II','type' => '1'),
            array('id' => '241','name' => 'Principal Warden I ','type' => '1'),
            array('id' => '242','name' => 'Principal Warden II','type' => '1'),
            array('id' => '243','name' => 'Games Tutor I ','type' => '1'),
            array('id' => '244','name' => 'Games Tutor II','type' => '1'),
            array('id' => '245','name' => 'Senior Games Tutor I ','type' => '1'),
            array('id' => '246','name' => 'Senior Games Tutor II','type' => '1'),
            array('id' => '247','name' => 'Principal Games Tutor I ','type' => '1'),
            array('id' => '248','name' => 'Principal Games Tutor II','type' => '1'),
            array('id' => '249','name' => 'Medical Officer/Dental Surgeon I ','type' => '1'),
            array('id' => '250','name' => 'Senior Medical Officer/Dental Surgeon I ','type' => '1'),
            array('id' => '251','name' => 'Senior Medical Officer/Dental Surgeon II','type' => '1'),
            array('id' => '252','name' => 'Principal Medical Officer/Dental Surgeon I ','type' => '1'),
            array('id' => '253','name' => 'Optometrist I ','type' => '1'),
            array('id' => '254','name' => 'Optometrist II','type' => '1'),
            array('id' => '255','name' => 'Senior Optometrist I ','type' => '1'),
            array('id' => '256','name' => 'Senior Optometrist II','type' => '1'),
            array('id' => '257','name' => 'Principal Optometrist I ','type' => '1'),
            array('id' => '258','name' => 'Principal Optometrist II','type' => '1'),
            array('id' => '259','name' => 'Assistant Medical Officer I ','type' => '1'),
            array('id' => '260','name' => 'Assistant Medical Officer II','type' => '1'),
            array('id' => '261','name' => 'Senior Assistant Medical Officer I ','type' => '1'),
            array('id' => '262','name' => 'Senior Assistant Medical Officer II','type' => '1'),
            array('id' => '263','name' => 'Principal Assistant Medical Officer','type' => '1'),
            array('id' => '264','name' => 'Assistant Environmental Health Officer I','type' => '1'),
            array('id' => '265','name' => 'Assistant Environmental Health Officer II ','type' => '1'),
            array('id' => '266','name' => 'Senior Assistant Environmental Health Officer I ','type' => '1'),
            array('id' => '267','name' => 'Senior Assistant Environmental Health Officer II','type' => '1'),
            array('id' => '268','name' => 'Principal Assistant Environmental Health Officer I ','type' => '1'),
            array('id' => '269','name' => 'Pharmaceutical Technician I ','type' => '1'),
            array('id' => '270','name' => 'Pharmaceutical Technician II','type' => '1'),
            array('id' => '271','name' => 'Senior Pharmaceutical Technician I ','type' => '1'),
            array('id' => '272','name' => 'Senior Pharmaceutical Technician II','type' => '1'),
            array('id' => '273','name' => 'Principal Pharmaceutical Technician I ','type' => '1'),
            array('id' => '274','name' => 'Principal Pharmaceutical Technician II','type' => '1'),
            array('id' => '275','name' => 'Nursing Officer I','type' => '1'),
            array('id' => '276','name' => 'Nursing Officer II','type' => '1'),
            array('id' => '277','name' => 'Senior Nursing Officer I','type' => '1'),
            array('id' => '278','name' => 'Principal Nursing Officer I ','type' => '1'),
            array('id' => '279','name' => 'Principal Nursing Officer II','type' => '1'),
            array('id' => '280','name' => 'Assistant Nursing Officer I ','type' => '1'),
            array('id' => '281','name' => 'Assistant Nursing Officer II','type' => '1'),
            array('id' => '282','name' => 'Senior Assistant Nursing Officer II','type' => '1'),
            array('id' => '283','name' => 'Principal Assistant Nursing Officer I ','type' => '1'),
            array('id' => '284','name' => 'Principal Assistant Nursing Officer II','type' => '1'),
            array('id' => '285','name' => 'Nurse I','type' => '1'),
            array('id' => '286','name' => 'Nurse II','type' => '1'),
            array('id' => '287','name' => 'Senior Nurse I ','type' => '1'),
            array('id' => '288','name' => 'Senior Nurse II','type' => '1'),
            array('id' => '289','name' => 'Principal Nurse I','type' => '1'),
            array('id' => '290','name' => 'Principal Nurse II','type' => '1'),
            array('id' => '291','name' => 'Clinical Officer I ','type' => '1'),
            array('id' => '292','name' => 'Clinical Officer II','type' => '1'),
            array('id' => '293','name' => 'Senior Clinical Officer I ','type' => '1'),
            array('id' => '294','name' => 'Senior Clinical Officer II','type' => '1'),
            array('id' => '295','name' => 'Principal Clinical Officer I ','type' => '1'),
            array('id' => '296','name' => 'Principal Clinical Officer II','type' => '1'),
            array('id' => '297','name' => 'Health Laboratory Assistant I ','type' => '1'),
            array('id' => '298','name' => 'Health Laboratory Assistant II','type' => '1'),
            array('id' => '299','name' => 'Senior Health Laboratory Assistant I ','type' => '1'),
            array('id' => '300','name' => 'Senior Health Laboratory Assistant II','type' => '1'),
            array('id' => '301','name' => 'Principal Health Laboratory Assistant ','type' => '1'),
            array('id' => '302','name' => 'Principal Health Laboratory Assistant II','type' => '1'),
            array('id' => '303','name' => 'Dental Laboratory Assistant I ','type' => '1'),
            array('id' => '304','name' => 'Dental Laboratory Assistant II','type' => '1'),
            array('id' => '305','name' => 'Senior Dental Laboratory Assistant I ','type' => '1'),
            array('id' => '306','name' => 'Senior Dental Laboratory Assistant II','type' => '1'),
            array('id' => '307','name' => 'Principal Dental Laboratory Assistant I','type' => '1'),
            array('id' => '308','name' => 'Principal Dental Laboratory Assistant II','type' => '1'),
            array('id' => '309','name' => 'Health Laboratory Technologist I','type' => '1'),
            array('id' => '310','name' => 'Health Laboratory Technologist II','type' => '1'),
            array('id' => '311','name' => 'Senior Health Laboratory Technologist I ','type' => '1'),
            array('id' => '312','name' => 'Senior Health Laboratory Technologist II','type' => '1'),
            array('id' => '313','name' => 'Principal Health Laboratory Technologist I ','type' => '1'),
            array('id' => '314','name' => 'Principal Health Laboratory Technologist II','type' => '1'),
            array('id' => '315','name' => 'Dental Laboratory Technologist I ','type' => '1'),
            array('id' => '316','name' => 'Dental Laboratory Technologist II','type' => '1'),
            array('id' => '317','name' => 'Senior Dental Laboratory Technologist I ','type' => '1'),
            array('id' => '318','name' => 'Senior Dental Laboratory Technologist II','type' => '1'),
            array('id' => '319','name' => 'Principal Dental Laboratory Technologist I ','type' => '1'),
            array('id' => '320','name' => 'Principal Dental Laboratory Technologist II','type' => '1'),
            array('id' => '321','name' => 'Medical Attendant I ','type' => '1'),
            array('id' => '322','name' => 'Medical Attendant II','type' => '1'),
            array('id' => '323','name' => 'Senior Medical Attendant II','type' => '1'),
            array('id' => '324','name' => 'Principal Medical Attendant ','type' => '1'),
            array('id' => '325','name' => 'Pharmacist I ','type' => '1'),
            array('id' => '326','name' => 'Pharmacist II','type' => '1'),
            array('id' => '327','name' => 'Senior Pharmacist I ','type' => '1'),
            array('id' => '328','name' => 'Senior Pharmacist II','type' => '1'),
            array('id' => '329','name' => 'Principal Pharmacist I ','type' => '1'),
            array('id' => '330','name' => 'Cook Attendant I ','type' => '1'),
            array('id' => '331','name' => 'Cook Attendant II','type' => '1'),
            array('id' => '332','name' => 'Senior Cook Attendant I','type' => '1'),
            array('id' => '333','name' => 'Senior Cook Attendant II','type' => '1'),
            array('id' => '334','name' => 'Principal Cook Attendant ','type' => '1'),
            array('id' => '335','name' => 'Janitor I','type' => '1'),
            array('id' => '336','name' => 'Janitor II','type' => '1'),
            array('id' => '337','name' => 'Senior Janitor I ','type' => '1'),
            array('id' => '338','name' => 'Senior Janitor II','type' => '1'),
            array('id' => '339','name' => 'Principal Janitor I ','type' => '1'),
            array('id' => '340','name' => 'Principal Janitor II','type' => '1'),
            array('id' => '341','name' => 'Catering Officer I ','type' => '1'),
            array('id' => '342','name' => 'Catering Officer II','type' => '1'),
            array('id' => '343','name' => 'Senior Catering Officer I ','type' => '1'),
            array('id' => '344','name' => 'Senior Catering Officer II','type' => '1'),
            array('id' => '345','name' => 'Principal Catering Officer I','type' => '1'),
            array('id' => '346','name' => 'Principal Catering Officer II','type' => '1'),
            array('id' => '347','name' => 'Admission Officer I ','type' => '1'),
            array('id' => '348','name' => 'Admission Officer II','type' => '1'),
            array('id' => '349','name' => 'Senior Admission Officer I','type' => '1'),
            array('id' => '350','name' => 'Senior Admission Officer II','type' => '1'),
            array('id' => '351','name' => 'Principal Admission Officer I ','type' => '1'),
            array('id' => '352','name' => 'Principal Admission Officer II','type' => '1'),
            array('id' => '353','name' => 'Editor I ','type' => '1'),
            array('id' => '354','name' => 'Editor II','type' => '1'),
            array('id' => '355','name' => 'Senior Editor I','type' => '1'),
            array('id' => '356','name' => 'Senior Editor II','type' => '1'),
            array('id' => '357','name' => 'Principal Editor I ','type' => '1'),
            array('id' => '358','name' => 'Principal Editor II','type' => '1'),
            array('id' => '359','name' => 'Examination Officer I','type' => '1'),
            array('id' => '360','name' => 'Examination Officer II','type' => '1'),
            array('id' => '361','name' => 'Senior Examination Officer I','type' => '1'),
            array('id' => '362','name' => 'Senior Examination Officer II','type' => '1'),
            array('id' => '363','name' => 'Principal Examination Officer I ','type' => '1'),
            array('id' => '364','name' => 'Principal Examination Officer II','type' => '1'),
            array('id' => '365','name' => 'Printing Officer I ','type' => '1'),
            array('id' => '366','name' => 'Printing Officer II','type' => '1'),
            array('id' => '367','name' => 'Senior Printing Officer I ','type' => '1'),
            array('id' => '368','name' => 'Senior Printing Officer II','type' => '1'),
            array('id' => '369','name' => 'Principal Printing Officer I','type' => '1'),
            array('id' => '370','name' => 'Principal Printing Officer II','type' => '1'),
            array('id' => '371','name' => 'Soundman I ','type' => '1'),
            array('id' => '372','name' => 'Soundman II','type' => '1'),
            array('id' => '373','name' => 'Senior Soundman I ','type' => '1'),
            array('id' => '374','name' => 'Senior Soundman II','type' => '1'),
            array('id' => '375','name' => 'Principal Soundman I ','type' => '1'),
            array('id' => '376','name' => 'Principal Soundman II','type' => '1'),
            array('id' => '377','name' => 'Cameraman I ','type' => '1'),
            array('id' => '378','name' => 'Cameraman II','type' => '1'),
            array('id' => '379','name' => 'Senior Cameraman I','type' => '1'),
            array('id' => '380','name' => 'Senior Cameraman II','type' => '1'),
            array('id' => '381','name' => 'Principal Cameraman I','type' => '1'),
            array('id' => '382','name' => 'Principal Cameraman II','type' => '1'),
            array('id' => '383','name' => 'Producer I ','type' => '1'),
            array('id' => '384','name' => 'Producer II','type' => '1'),
            array('id' => '385','name' => 'Senior Producer I ','type' => '1'),
            array('id' => '386','name' => 'Senior Producer II','type' => '1'),
            array('id' => '387','name' => 'Principal Producer I ','type' => '1'),
            array('id' => '388','name' => 'Principal Producer II','type' => '1'),
            array('id' => '389','name' => 'Assistant Journalist I ','type' => '1'),
            array('id' => '390','name' => 'Assistant Journalist II','type' => '1'),
            array('id' => '391','name' => 'Senior Assistant Journalist I','type' => '1'),
            array('id' => '392','name' => 'Senior Assistant Journalist II','type' => '1'),
            array('id' => '393','name' => 'Principal Assistant Journalist I ','type' => '1'),
            array('id' => '394','name' => 'Principal Assistant Journalist II','type' => '1'),
            array('id' => '395','name' => 'Journalist I ','type' => '1'),
            array('id' => '396','name' => 'Journalist II','short_name' => ''),
            array('id' => '397','name' => 'Senior Journalist I ','type' => '1'),
            array('id' => '398','name' => 'Senior Journalist II','type' => '1'),
            array('id' => '399','name' => 'Principal Journalist I ','type' => '1'),
            array('id' => '400','name' => 'Principal Journalist II','type' => '1'),
            array('id' => '401','name' => 'Director of MISTECO','type' => '2','parent' => '4','directorate_id' => '17'),
            array('id' => '402','name' => 'Head of Software Systems Department','type' => '2','parent' => '50','organ_id' => '24'),
            array('id' => '403','name' => 'Head of  Human Resources Unit','type' => '2','parent' => '47','organ_id' => '25'),
            array('id' => '404','name' => 'Head of General administration Unit','type' => '2','parent' => '47','organ_id' => '26'),
            array('id' => '405','name' => 'Head of Transport Services Unit','type' => '2','organ_id' => '27','directorate_id' => '7'),
            array('id' => '406','name' => 'Head of Security Services Unit','type' => '2','parent' => '47','organ_id' => '28','directorate_id' => '7'),
            array('id' => '407','name' => 'Head of Planning and Project Development Unit','type' => '2','parent' => '42','organ_id' => '29'),
            array('id' => '408','name' => 'Head of  Budget, Monitoring and Evaluation Unit','type' => '2','parent' => '42','organ_id' => '30'),
            array('id' => '409','name' => 'Head of Resource Mobilization Unit ','type' => '2','parent' => '42','organ_id' => '31'),
            array('id' => '410','name' => 'Chief Accountant','short_name' => 'CA','category' => 'Administrative','type' => '2','directorate_id' => '8'),
            array('id' => '411','name' => 'Head of Public Relations and Communications Unit','type' => '2','parent' => '3','directorate_id' => '14'),
            array('id' => '412','name' => 'Head of Admissions Unit','type' => '2','parent' => '36','organ_id' => '32','directorate_id' => '1'),
            array('id' => '413','name' => 'Head of System Administration Unit','short_name' => 'SAU','category' => 'Administrative','type' => '2','parent' => '50','organ_id' => '22','directorate_id' => '11'),
            array('id' => '414','name' => 'Director of Students Affairs (Dean of Students)','short_name' => 'DSA','category' => 'Administrative','type' => '2','parent' => '5','directorate_id' => '6'),
            array('id' => '415','name' => 'Head of  Financial Accountant Unit','type' => '2','organ_id' => '33'),
            array('id' => '416','name' => 'Head of  Management Accounting Unit','type' => '2','organ_id' => '34'),
            array('id' => '417','name' => 'Head of Adminstration and Human Resource Management','type' => '2','parent' => '47','organ_id' => '25','directorate_id' => '7'),
            array('id' => '419','name' => 'Head Department of Energy and Power Engineering','short_name' => '','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '9'),
            array('id' => '420','name' => 'Head Department of Languages and Communication Skills','short_name' => '','category' => 'Academic','type' => '2','parent' => '17','organ_id' => '35'),
            array('id' => '421','name' => 'Head of Examinations Unit','type' => '2','organ_id' => '36','directorate_id' => '1'),
            array('id' => '422','name' => 'Head of Industrial Liaison Unit','type' => '2','parent' => '36','organ_id' => '37'),
            array('id' => '423','name' => 'Head of Loans and Scholarships Unit','type' => '2','organ_id' => '38','directorate_id' => '1'),
            array('id' => '424','name' => 'Head of Legal Services Unit','type' => '2','directorate_id' => '16'),
            array('id' => '425','name' => 'Head of Networking Unit','type' => '2','organ_id' => '23','directorate_id' => '11'),
            array('id' => '426','name' => 'Director of Centre of Distance and Continuing Education','short_name' => '','category' => 'Academic','type' => '2','directorate_id' => '3'),
            array('id' => '427','name' => 'Head of Students Health, Development and Counseling Unit','type' => '2','organ_id' => '39'),
            array('id' => '428','name' => 'Head of Students Government, Judicatory & Control Unit','type' => '2','organ_id' => '40'),
            array('id' => '429','name' => 'Head of Students Sports and Games Unit','type' => '2','organ_id' => '41'),
            array('id' => '430','name' => 'Head of Students Catering and Accommodation Unit','type' => '2','organ_id' => '42'),
            array('id' => '431','name' => 'Head of Buildings and Civil Works Unit','type' => '2','organ_id' => '43'),
            array('id' => '432','name' => 'Head of Equipments and Machinery Unit','type' => '2','organ_id' => '44'),
            array('id' => '433','name' => 'Head of  Environmental Unit','type' => '2','organ_id' => '45'),
            array('id' => '434','name' => 'Head of Department of  Electrical and Power Engineering','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '63'),
            array('id' => '435','name' => 'Head of Department of  Mechanical and industrial Engineering','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '55'),
            array('id' => '436','name' => 'Head of Department of  Geosciences and Mining Technology','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '62'),
            array('id' => '437','name' => 'Head of Department of  Chemical Processing and Environmental Engineering','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '15','organ_id' => '60'),
            array('id' => '438','name' => 'Head of Department of  Technical Education','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '66'),
            array('id' => '439','name' => 'Head of Department of  Mathematics and Statistics','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '51'),
            array('id' => '440','name' => 'Head of Department of  Applied Sciences','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '53'),
            array('id' => '441','name' => 'Head of Department of  Medical Sciences and Technology','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '16','organ_id' => '64'),
            array('id' => '443','name' => 'Principal, College of Humanities and Business Studies','short_name' => '','organ_id' => '6'),
            array('id' => '444','name' => 'Head of Department of  Humanities','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '442','organ_id' => '49'),
            array('id' => '445','name' => 'Principal, College of Architecture and Construction Technology','short_name' => '','organ_id' => '46'),
            array('id' => '446','name' => 'Head of Department of  Architecture and Art Design','short_name' => '','organ_id' => '46'),
            array('id' => '447','name' => 'Head of Department of  Urban Planning and Real Estate Studies','short_name' => '','category' => 'Academic','type' => '2','parent' => '445','organ_id' => '75'),
            array('id' => '448','name' => 'Head of Department of  Construction Management and Technology','short_name' => 'HOD','category' => 'Academic','type' => '2','parent' => '445','organ_id' => '52'),
            array('id' => '450','name' => 'Head of Department of  Computer Science and Engineering','short_name' => '','category' => 'Academic','type' => '2','parent' => '449','organ_id' => '59'),
            array('id' => '451','name' => 'Head of Department of  Information Systems and Technology','short_name' => '','category' => 'Academic','type' => '2','parent' => '449','organ_id' => '50'),
            array('id' => '452','name' => 'Head of Department of  Electronics and Telecommunications Engineering','short_name' => '','category' => 'Academic','type' => '2','parent' => '449','organ_id' => '8'),
            array('id' => '453','name' => 'Head of Department of  Content Engineering and Multimedia Technology','short_name' => '','category' => 'Academic','type' => '2','parent' => '449','organ_id' => '73'),
            array('id' => '454','name' => 'Head of Department of  Informatics','short_name' => '','category' => 'Academic','type' => '2','parent' => '449','organ_id' => '74'),
            array('id' => '455','name' => 'Principal, College of Information and Communications Technology','short_name' => '','organ_id' => '48'),
            array('id' => '456','name' => 'Director Public Services and External Links','short_name' => 'DPSEL','category' => 'Administrative','type' => '2','directorate_id' => '21'),
            array('id' => '457','name' => 'Director ICT Services and Statistics','short_name' => 'DICTSS','category' => 'Administrative','type' => '2','parent' => '5','directorate_id' => '11'),
            array('id' => '458','name' => 'Director Rural Technology Park','short_name' => 'DRTP','category' => 'Academic','type' => '2','parent' => '18','organ_id' => '72','directorate_id' => '20'),
            array('id' => '459','name' => 'Director Centre for Innovation and Technology Transfer','short_name' => 'DCITT','organ_id' => '100'),
            array('id' => '461','name' => 'Director Centre for Virtual and Continuing Education','short_name' => 'DCVCE','organ_id' => '99'),
            array('id' => '462','name' => 'Head of Department of  Entrepreneurship and Business Management','short_name' => 'HODEBM','category' => 'Academic','type' => '2','parent' => '459','organ_id' => '105')
          );

        $directorates = array(
            array('id' => '1','name' => 'Directorate of Undergraduate Studies','short_name' => 'DUS','biography' => '<p style="text-align: justify;">The Directorate of Undergraduate Studies (DUS) falls under the Deputy Vice Chancellor - Academic, Research and Consultancy (DVC- ARC). There is a Director who coordinates the day to day activities of the Directorate. Within the Directorate, there are four main units, each of which has its own Head. The Units are as follows:</p>
          <ol>
          <li>Admissions Office</li>
          <li>Examinations Office</li>
          <li>Industrial Liaison Office</li>
          <li>Loans and Scholarships Office</li>
          </ol>
          <div class="offset-top-50">
          <p><strong>The core functions of the Directorate are</strong><span style="font-size: 12pt;"><strong>:</strong></span>-</p>
          <ol>
          <li>Coordinate students Admission and Registration activities</li>
          <li>Prepare University Teaching and Examination Timetables</li>
          <li>Coordinate the preparation of facilities for use during Examinations</li>
          <li>Monitor the conduct of University Examinations</li>
          <li>Custodian of students personal and academic records</li>
          <li>Coordinate students Industrial Practical Training (IPT) and Research activities</li>
          </ol>
          <div class="text-subline offset-md-top-5">&nbsp;</div>
          </div>
          <p>&nbsp;</p>','email' => 'dus@mustnet.ac.tz','phone_1' => '+255737680001','phone_2' => '+255 754463572','fax' => '','address' => 'P.O.Box 131 Mbeya - Tanzania','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:38:17','banner' => '','designation_id' => '4'),
            array('id' => '2','name' => 'Directorate of Postgraduate Studies, Research and Publications','short_name' => 'DPSRP','biography' => '<p style="text-align: justify;">Directorate of Postgraduate Studies, Research, and Publications (DPSRP) is one of the youngest Directorates in Mbeya University of Science and Technology (MUST). It was set up in order to enhance the University\'s image as a premier academic, research and publications institution of international rank.</p>
          <p><strong>Structure and Activities</strong></p>
          <p style="text-align: justify;">The Directorate co-ordinates, monitors and organizes postgraduate programmes, research, and publications at the University. Its activities are tailored to feed into the University\'s programmes development and improvements. This enables the University to design and deliver up-to-date and relevant programmes that meet the needs of society and the world at large.</p>
          <p><strong>Units</strong></p>
          <p>The Directorate is divided into two Units with different coordinators (to be appointed) and activities:</p>
          <ul>
          <li><strong>Research and Publications Unit<br /></strong></li>
          </ul>
          <p>The Research and Publications Unit is responsible for the following activities:</p>
          <ol>
          <li>It coordinates research activities undertaken by MUST members of staff, students, research fellows and associates under various collaborative arrangements. MUST priority research areas include those in science, technology, community development, business management, and entrepreneurship?</li>
          <li>It oversees the quality of academic works produced by staff members of the University, students and other stakeholders.</li>
          <li>It ensures proper documentation and dissemination of publications.</li>
          <li>Currently, the Unit coordinates the publication of the MUST Newsletter, MUST working papers/books and teaching manuals written by MUST academic staff.</li>
          </ol>
          <ul>
          <li><strong>Postgraduate Studies Unit<br /></strong></li>
          </ul>
          <p>The Unit of Postgraduate Studies is responsible for the overall management and quality assurance/control of postgraduate training programmes at the University. The Programmes (in different fields) coordinated by the Unit of Postgraduate Studies are:</p>
          <ol>
          <li>Postgraduate Diploma</li>
          <li>Masters Degree</li>
          <li>Doctor of Philosophy</li>
          </ol>','email' => 'dpsrp@mustnet.ac.tz','phone_1' => '+255 252 502 861','phone_2' => '+255 2503016/7','fax' => '+255 252 502 302','address' => 'P. O. Box 131, Mbeya','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:39:24','banner' => '','designation_id' => '4'),
            array('id' => '3','name' => 'Centre of Distance and Continuing Education','short_name' => 'CDCE','biography' => '<p style="text-align: justify;">The Centre for Distance and Continuing Education (CDCE) is responsible for all matters related to delivery and administration of Continuing Education and Professional Development to people who have completed formal or informal education system. Continuing Education and Professional Development help to build and to maintain confidence to course participants. It is a great way to ensure participants&rsquo; knowledge is always relevant to the modern day situation.</p>
          <p style="text-align: justify;">The Centre makes sure that the designed courses are prepared to suite participants\' busy working schedules. It also ensures that every programme offered is up to date and prepares participants for an increasingly competitive market world. The more frequently participants attend these courses, the more they become competent to do their work and have potential contributions to their workplaces.</p>
          <p style="text-align: justify;">The Center also conducts various types of language training. Currently, there is a Chinese language being taught at the Center. The Center does conduct sensitization campaign annually by visiting secondary schools or by inviting secondary school students at MUST to sensitize and encourage female students as well as male students to opt for science subjects at secondary school level.</p>','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => 'P. O. Box 131, Mbeya - Tanzania','status' => 'Inactive','is_deleted' => '','created_at' => '2019-04-11 17:43:41','banner' => '','designation_id' => '4'),
            array('id' => '4','name' => 'Directorate of Library Services','short_name' => 'DLS','biography' => '<p style="text-align: justify;" align="justify">MUST library provides resources and services to students, staff and the university community. Resources offered by the library are textbooks in both print and electronic format. It also provides the e-journal services. Resources offered to cater for all courses taught at the university which include: Architecture technology, Civil engineering, Computer engineering, Electrical and electronic engineering, Laboratory technology, Mechanical engineering, and Business management.</p>
          <p style="text-align: justify;" align="justify">Electronic journal service is offered through subscription to various international journal databases as well as through Open Access (OA).</p>
          <p style="text-align: justify;" align="justify">Currently, the library occupies part of the administration block on the ground floor and the first floor. The first floor part is reserved for general collection while the ground floor part is reserved for special reserve materials. In both floors, there are study spaces.</p>
          <p style="text-align: justify;" align="justify">The library is among academic units of the Mbeya University of Science and Technology (MUST). The major mission is to provide high quality information services, which support teaching, learning, research, and consultancy services to the community. In addition to the traditional library services, MUST library presents a holistic e-service to its clients, including e-books and e-journals.</p>','email' => 'library@mustnet.ac.tz','phone_1' => '+255  252 503 016','phone_2' => '','fax' => '','address' => 'P.O BOX 131, Mbeya - Tanzania.','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:44:20','banner' => '','designation_id' => '4'),
            array('id' => '5','name' => 'Directorate of Planning and Investment','short_name' => 'DPD','biography' => '<p style="text-align: justify;"><strong>DIRECTORATE BRIEF</strong></p>
          <p style="text-align: justify;">Directorate of Planning and Development was established in 2012/2013 following the transformation of Mbeya Institute of Science and Technology to Mbeya University of Science and Technology in order to strengthen planning and development undertakings in the University. The Directorate operates under the Office of Deputy Vice Chancellor &ndash; Planning, Finance and Administration. Formerly, it existed as a Planning Office. The Directorate of Planning and Development comprises of three units namely:-</p>
          <ol style="text-align: justify;">
          <li>Planning and Project Development Unit,</li>
          <li>Budget, Monitoring and Evaluation Unit</li>
          <li>Resource Mobilization Unit.</li>
          </ol>
          <p style="text-align: justify;"><strong>STAFFING</strong></p>
          <p style="text-align: justify;">Staffing has grown from 1 to 6 staff with a Director as the Head. The Directorate is one of the key functional units of the University as it is responsible for coordinating all matters related to planning and development issues.</p>
          <p style="text-align: justify;"><strong>MANDATE</strong></p>
          <p style="text-align: justify;">The mandate of the Directorate of Planning and Developent includes:</p>
          <ol style="text-align: justify;">
          <li>Advisor to the office of Deputy Vice Chancellor - Planning, Finance and Administration on all matters pertaining to planning and development.</li>
          <li>Develops and reviews the corporate strategic plan and appropriately advises the management.</li>
          <li>Develops and reviews the master plan and appropriately advises the management.</li>
          <li>Establishes and manages University databank</li>
          <li>Effectively markets the University plans internally and externally</li>
          <li>Proposes effective strategies for mobilizing resources for implementing the university plans.</li>
          <li>Prepares annual budgets.</li>
          <li>Prepares plans or project documents.</li>
          <li>Prepares planning policy for the University.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          </ol>
          <p><strong>INVESTMENT AND RESOURCE MOBILIZATION</strong></p>
          <p style="text-align: justify;">The Directorate of Planning and Development is mandated to undertake and implement all activities related to resources mobilization in relation to the overall strategic plan of the Mbeya University of Science and Technology. It also coordinates University&rsquo;s efforts towards the sustainable financing of its programs. Thus the University is determined to attract more stakeholders to invest at the University through Public Private Partnership arrangements in its flagship projects. &nbsp;In light of that, the Directorate is working continuously to identify potential collaborators/investor(s) who can invest in various projects at the University premise including; &nbsp;</p>
          <ol style="text-align: justify;">
          <li>Construction of students&rsquo; hostels</li>
          <li>Construction of business centre</li>
          <li>Construction of Technology and Science Park</li>
          <li>Construction of conference centre.</li>
          </ol>
          <p style="text-align: justify;"><strong>&nbsp;NB: UNSOLICITED PROJECTS:</strong></p>
          <p style="text-align: justify;">Mbeya University of Science and Technology also do attract development partners with unsolicited PPP projects. For further correspondences, development partner with unsolicited PPP project should direct enquiries or Letter of Interest (LOI) to Vice Chancellor via the following emails:</p>
          <ol>
          <li style="text-align: left;"><a href="mailto:vc@mustnet.ac.tz">vc@mustnet.ac.tz</a>,</li>
          <li style="text-align: left;"><a href="mailto:dvcpfa@mustnet.ac.tz">dvcpfa@mustnet.ac.tz</a></li>
          <li style="text-align: left;"><a href="mailto:dpd@mustnet.ac.tz">dpd@mustnet.ac.tz</a></li>
          </ol>
          <p style="text-align: justify;">&nbsp;</p>','email' => 'dpd@mustnet.ac.tz','phone_1' => '+255 (0)25 2502861 Ext. 230','phone_2' => '+255  752 485  744','fax' => '255 (0)25 2502302','address' => 'P.O. BOx 131, MBEYA','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:44:49','banner' => '','designation_id' => '5'),
            array('id' => '6','name' => 'Directorate of Students Affairs','short_name' => 'DSA','biography' => '<p style="text-align: justify;" align="justify">The Directorate of Students Affairs (DSA) is working under the Deputy Vice Chancellor responsible with Planning, Finance and Administration (DVC PFA). The primary functions of the DSA is to provide welfare services and support for enhancing students growth and development in the University. This directorate is headed by the Dean of Students who is assisted by a number of staff with a wide scope of knowledge in students welfare matters.</p>
          <p style="text-align: justify;" align="justify">DSA centers for the needs of all students regardless of their programmes, colleges, institutes, schools or where they reside (on-campus or off-campus). For that, if a student has any questions or problems and would like to find a solution, he/she can choose DSA as a starting point to find the way to live in the University and serving as an advocate and guide them to many essential resources available in the University.</p>
          <p style="text-align: justify;" align="justify">The basic principle that guides DSA is the provision of high quality services that nurture students to engage in academic and social development. This signifies that students receive adequate information that helps them to make a smooth transition in the University and beyond. DSA always responds to the needs of students by connecting them to various sources of information and/or services. Basically, DSA plays a pivotal role in making life easier for University students by empowering them with adequate knowledge that increases individual strength and confidence in support of University vision, mission and objectives.</p>
          <p style="text-align: justify;" align="justify">Welfare services offered by the DSA include; students leadership, catering, accommodation, sports and games, counseling and guidance, banking, finances, fellowship affairs, clubs/societies, life skills, health, mediate conflicts, security matters, etc. All these welfare services are offered in two departments as follows:</p>
          <ul>
          <li>Students\' Welfare Services (Counseling, catering, health, NHIF matters, accommodation, sports and games, life skills, HIV/AIDS campaign, security matters, etc.)</li>
          <li>Students\' Governance (students leadership, students behaviour/discipline, banking, finances, fellowship affairs,clubs/societies, students organisation meetings, mediate conflicts, etc)</li>
          </ul>','email' => 'dos@mustnet.ac.tz','phone_1' => '+255754642895','phone_2' => '+255737680444','fax' => '','address' => 'P.O.Box 131, Mbeya - Tanzania.','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:45:18','banner' => '','designation_id' => '5'),
            array('id' => '7','name' => 'Directorate of Administration and Human Resource Management','short_name' => 'DAHRM','biography' => '<p style="text-align: justify;">The objective of the Directorate is to attract, develop, and retain the talented people necessary to deliver the highest quality service to our students and community by focusing in supporting a diverse workforce within an inclusive work environment through responsive human resource processes and services.</p>
          <p>The Directorate of Administration and Human Resource Management is made up with the following departments;</p>
          <p><strong>1.&nbsp; Department of Administration and Human Resource Management</strong></p>
          <p style="text-align: justify;">The department is embedded in providing and interpreting policy statements and University Regulations, reviewing and recommending the approval of various policies and guidelines, and general organization, supervision and management of administration operations of the entire University community.</p>
          <p style="text-align: justify;">&nbsp;</p>
          <p><strong>2. Department of Transport Services</strong></p>
          <p style="text-align: justify;">Transport Services department coordinates transport issues of the university and monitoring and maintaining the University vehicles of the entire University.</p>
          <p style="text-align: justify;">&nbsp;</p>
          <p style="text-align: justify;"><strong>3. Department of Security Services</strong></p>
          <p style="text-align: justify;">To a large extent the Security Services Department is geared in maintaining and monitoring peace, harmony and security of the University Community.</p>
          <p>For details about the Directorate please do not hesitate to contact us at <a href="mailto:dahrm@mustnet.ac.tz">dahrm@mustnet.ac.tz</a></p>
          <p>&nbsp;</p>
          <p><strong>Leaders of the Directorate</strong></p>
          <p>Mrs Devotha M. Msuya</p>
          <p>Director of Administration and Human Resource Management</p>
          <p>Msc Human Resource Management</p>
          <p>Tel: 0735 050500</p>
          <p>Email: <a href="mailto:dahrm@must.net.ac.tz">dahrm@must.net.ac.tz</a></p>
          <p>&nbsp;</p>
          <p>Ms. Judith Egina</p>
          <p>Head of Administration and Human Resource Management</p>
          <p>Master of Business Administration (HRM)</p>
          <p>Tel: 0745 073417</p>
          <p>Email: <a href="mailto:hr@mustnet.ac.tz">hr@mustnet.ac.tz</a></p>
          <p>&nbsp;</p>
          <p>Mr. Samuel Kapotoka</p>
          <p>Security Officer</p>
          <p>Tel: 0743 648831</p>
          <p>&nbsp;</p>
          <p>Mr. Shabani Mdende</p>
          <p>Acting Head of Transport Unit</p>
          <p>Tel: 0754 939246</p>','email' => 'dahrm@mustnet.ac.tz','phone_1' => '+255 2503016/7','phone_2' => '+255 0735050500','fax' => '+2552502302','address' => 'Box 131, Mbeya','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:45:45','banner' => '','designation_id' => '5'),
            array('id' => '8','name' => 'Directorate of Finance','short_name' => 'DoF','biography' => '<p style="text-align: justify;">The Directorate of Finance is one of the non-academic directorates in the university. It operates under the office of Vice Chancellor-Planning, Finance and Administration (VC-PFA). It principally deals with accounting and financial management.</p>
          <p style="text-align: justify;">The directorate has two main units. These units are Management Accounting and Financial Accounting. The Management Accounting unit is comprised of four sections dedicated to perform some functions. The functions are preparation of financial reports for both internal and external use; payroll; bank reconciliation; and fixed asset register. On the other hand, The Financial Accounting unit is comprised of three sections. These sections are revenue, expenditure and cash section. The units are described below in details:</p>','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:46:41','banner' => '','designation_id' => '5'),
            array('id' => '9','name' => 'Directorate of Estates and Technical Services','short_name' => 'DETS','biography' => '<p><strong>DIRECTORATE OF ESTATES AND </strong><strong>TECHNICAL SERVICES</strong></p>
          <ol>
          <li><strong>Objective of </strong><strong>Directorate of Building and Estates</strong></li>
          </ol>
          <p>The objective of the Directorate is to undertake all activities related to development, alteration and operation of the physical estate and buildings and their services, supporting the educational and other activities of the University. The Directorate is headed by a Director appointed by the University Council.</p>
          <p>&nbsp;</p>
          <ol>
          <li><strong>Functions of the </strong><strong>Directorate</strong></li>
          <li>Advises and assists the Deputy Vice Chancellor &ndash; PFA on matters pertaining to buildings, estates and technical services</li>
          <li>Ensures maintenance and cleaning of University properties and environment</li>
          </ol>
          <ul>
          <li>Examines bills of quantities of buildings, estates and technical services</li>
          </ul>
          <ol>
          <li>Prepares work schedules of buildings, estates and technical services</li>
          <li>Prepares budget for maintenance works</li>
          <li>Develops short and long term programmes for the general improvement of the landscaping of the campus grounds and drainage systems.</li>
          </ol>
          <ul>
          <li>Formulates policies on Buildings and Estates Management</li>
          <li>Ensures University machines and equipment are in good working order</li>
          </ul>
          <ol>
          <li>Ensures innovative approaches to conditioning, maintaining, and upgrading the built and un-built environment.</li>
          <li>Plans, organizes, implements and controls Buildings, Estates activities and technical services.</li>
          <li>Devises methods and procedure for monitoring and control of Buildings and Estates functions.</li>
          </ol>
          <ul>
          <li>Coordinates work programs in collaboration with building and maintenance staff of the Buildings and Estates.</li>
          <li>Coordinates the preparation of the physical master plan.</li>
          <li>Prepares and compiles budget estimates for Capital Development.</li>
          </ul>
          <ol>
          <li>Coordinates the effective maintenance and rehabilitation of the infrastructure.</li>
          </ol>
          <ul>
          <li>Performs any other duties as may be assigned to the directorate</li>
          </ul>
          <p><strong>&nbsp;</strong></p>
          <p>The Directorate of Estates and Technical Services comprises of the following sections&nbsp;</p>
          <ul>
          <li>Buildings and Civil Works</li>
          <li>Equipments and Machinery</li>
          <li>Environmental Services</li>
          </ul>
          <p>&nbsp;</p>
          <table width="100%">
          <tbody>
          <tr>
          <td>
          <p>DEPUTY VICE CHANCELLOR - PFA</p>
          <p>&nbsp;</p>
          </td>
          </tr>
          </tbody>
          </table>
          <table width="100%">
          <tbody>
          <tr>
          <td>
          <p>DIRECTOR</p>
          <p>&nbsp;Estates and Technical Services</p>
          </td>
          </tr>
          </tbody>
          </table>
          <table width="100%">
          <tbody>
          <tr>
          <td>
          <p>Head</p>
          <p>Buildings and Civil Works</p>
          </td>
          </tr>
          </tbody>
          </table>
          <table width="100%">
          <tbody>
          <tr>
          <td>
          <p>Head</p>
          <p>Equipments and Machinery</p>
          <p>&nbsp;</p>
          </td>
          </tr>
          </tbody>
          </table>
          <table width="100%">
          <tbody>
          <tr>
          <td>
          <p>Head</p>
          <p>Environmental Services</p>
          <p>&nbsp;</p>
          </td>
          </tr>
          </tbody>
          </table>
          <p>&nbsp;</p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p>&nbsp;</p>
          <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><strong>&nbsp;</strong></p>
          <p><a name="_Toc462112414"></a><strong>The Organ gram for the Directorate of Estates and Technical Services</strong></p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:47:05','banner' => '','designation_id' => '5'),
            array('id' => '10','name' => 'Directorate of MUST Consultancy Bureau','short_name' => 'MCB','biography' => '<p align="justify"><strong>WHAT &nbsp; MUST CONSULTANCY BUREAU (MCB) IS ALL ABOUT?&nbsp;</strong>&nbsp;<br />MUST Consultancy Bureau (MCB) was established in November, 2007 with the aim of coordinating the use of expertise and other resources to contribute effectively to the industrial and Socio-economic development of Tanzania. Emphasis is placed on providing complete, comprehensive and integrated consultancy services. MCB further aims at promoting effective entrepreneurship and use of appropriate technology that meets national and international needs and standards through skills and practical oriented training and consultancy.<br />Apart from offering education and training, the University aims at promoting staff and student&rsquo;s innovativeness, initiative and readiness in their fields of specialization and study. It also aims at carrying out applied research and consultancy as part of the realization of its Mission and Vision.<br />The MUST Consultancy Bureau draws its human resources from the University&rsquo;s internal pool of highly qualified and experienced academic and technical staff. MCB provides a variety of consultancy services for a cross &ndash; section of building and other projects from inception&nbsp;to completion. University experts work&nbsp;together on demanding and challenging&nbsp;problems,&nbsp;producing&nbsp;&nbsp; results with evidence&nbsp;of a broad spectrum of experience and knowledge.&nbsp; MCB is able to pool the best expertise for any given assignment.<br /><strong>WHAT&nbsp;AREA OF CONSULTANCY IS GIVEN A TOP PRIORITY?</strong>&nbsp;<br />MCB is structured to provide comprehensive and integrated Services. The services embrace most aspects of :-</p>
          <ol start="1" type="1">
          <li>Construction which include:-</li>
          <ul type="circle">
          <li>Buildings</li>
          <li>Roads and Bridges</li>
          <li>Irrigation Schemes</li>
          </ul>
          <li>Geotechnical Investigations &amp; Material Testing</li>
          <li>Hydropower</li>
          <li>Business Plans</li>
          </ol>
          <p align="justify">The Bureau provides support throughout the project development circle covering: project concept, planning and evaluation of resources, Feasibility studies, project supervision and overall management, technical support and training.<br /><strong>TARGET MARKET OF THE BUREAU?</strong>&nbsp;<br />Targeted markets of MUST Consultancy Bureau (MCB) are:</p>
          <ul type="disc">
          <ol start="1" type="1">
          <li>Government Agencies like Local Governments and Government Ministries</li>
          <li>Non Governmental Organisations</li>
          <li>International Agencies</li>
          <li>Private Companies</li>
          <li>Individuals</li>
          </ol>
          </ul>
          <p align="justify"><strong>IS THE BUREAU RUN INDEPENDENTLY OR DOES IT RELY FINANCIALLY ON THE UNIVERSITY?</strong>&nbsp;<br />MUST Consultancy Bureau is run independently; it does not rely financially on the University. Efficient organization and administration of the consultancy activities has a vital role in the perception of quality by the clients. The role of the University&rsquo;s Management is to ensure efficiency in MCB and to audit quality so as to establish a high reputation for the delivery of consultancy services.&nbsp;<br /><strong>WHAT ARE THE BUREAU&rsquo;S PRIORITIES?</strong>&nbsp;<br />MCB priorities can be easily observed from its mission, vision and objectives and which are as follows:-<br />Vision<br />To become the most recognized professional service provider by delivering high quality and excellent consultancy services in Science, Technology and Management locally and globally.<br />Mission&nbsp;<br />To provide high quality consultancy services particularly in Science, Technology and Management through:-</p>
          <ul>
          <ul>
          <ul>
          <ul>
          <ul>
          <li>Cultivating a conducive environment for attracting consultancy projects</li>
          <li>Coordinating consultancy projects across the University</li>
          <li>Meeting societal challenges through transferring appropriate technologies
          <ul>
          <li><strong>VISION AND MISSION</strong></li>
          </ul>
          <p><strong>&nbsp;</strong></p>
          <ul>
          <li><a name="_Toc418630836"></a> <strong>Vision</strong></li>
          </ul>
          <p>To become the most recognized professional service provider by delivering high quality and excellent construction services in Engineering, and Technology, both locally and globally</p>
          <ul>
          <li><a name="_Toc418630837"></a> <strong>Mission</strong></li>
          </ul>
          <p>To provide high quality construction services particularly in Engineering and Technology through:-</p>
          <ol>
          <li>Nurturing a conducive environment for attracting construction projects</li>
          <li>Coordinating construction projects across the University</li>
          </ol>
          <ul>
          <li>
          <ul>
          <li><strong>PROJECTS</strong> <strong>EXECUTE TO-DATE</strong>
          <ul>
          <li>Provide Bill Of Quantity (BOQ) of electrical machinery, equipment and protection</li>
          <li>Installation and repair of Electronics machinery and equipment</li>
          <li>Maintenance and repair of all the above mentioned
          <ul>
          <li>Construction of interiors; office partitioning, cabinet installations and all interior works
          <ul>
          <li>Construction of drainage structures.Meeting societal challenges through transferring appropriate technologies
          <ul>
          <li>&nbsp;</li>
          <li>&nbsp;</li>
          <li><strong>COMPANY&rsquo;S MAJOR AREAS OF ENGAGEMENT</strong></li>
          </ul>
          <p>The Company&rsquo;s area of engagement is divided into four sections; civil, building, electrical and mechanical:</p>
          <ul>
          <li><strong>Civil Department</strong></li>
          </ul>
          <p>Under civil, the company can stretch its services to:</p>
          <ol>
          <li>Construction of road works.</li>
          <li>Road maintenance.</li>
          </ol>
          <ul>
          <li>Construction of bridges.</li>
          </ul>
          <ol>
          <li>Construction of culverts.</li>
          <li>Irrigation schemes.</li>
          <li>Construction of water supply schemes.</li>
          </ol>
          </li>
          </ul>
          <ul>
          <li><strong>Building Department</strong></li>
          </ul>
          <p>Under building, the company can offer the following services</p>
          <ol>
          <li>Construction of high rise and low rise buildings</li>
          <li>Construction of office buildings</li>
          </ol>
          <ul>
          <li>Construction of commercial buildings</li>
          </ul>
          <ol>
          <li>Construction of residential and apartments</li>
          <li>Construction of warehouses and storage facilities</li>
          <li>Renovation and remodeling of the dilapidated buildings/structures ranging from residential, offices and commercial buildings.</li>
          </ol>
          </li>
          </ul>
          <ul>
          <li><strong>Electrical Department</strong></li>
          </ul>
          <p>Under electrical, the company can do the following</p>
          <ol>
          <li>Design and installation of electrical power layout in both domestic and commercial premises</li>
          <li>Installation of electrical machinery and equipment in both domestic and industries</li>
          </ol>
          <ul>
          <li>Construction of electrical substations</li>
          </ul>
          <ol>
          <li>Construction of service and distribution lines (both overhead and underground)</li>
          <li>Construction of transmission lines (both LV &amp; HV), including erection of towers and tower foundations</li>
          <li>Installation of renewable energy stands (Solar, Wind, Biogas )</li>
          </ol>
          <ul>
          <li>Installation of Telecommunication systems</li>
          <li>Installation and repair of different air conditioning systems</li>
          </ul>
          <ol>
          <li>TV and Computer maintenance and troubleshooting</li>
          <li>Motor and Transformer rewinding</li>
          <li>Transformer testing and Commissioning</li>
          </ol>
          </li>
          </ul>
          <ul>
          <li><strong>Mechanical Department</strong></li>
          </ul>
          <p>Under mechanical the company can do the following:</p>
          <ol>
          <li>Maintenance and repair of motor vehicles</li>
          <li>Panel biting and spray painting for damaged bodies of vehicles.</li>
          </ol>
          <ul>
          <li>Diesel injector pump services</li>
          </ul>
          <ol>
          <li>Motor vehicle Wheel balancing</li>
          <li>Motor vehicles trouble shooting diagnosis</li>
          <li>Crane services</li>
          </ol>
          <ul>
          <li>Energy auditing in buildings</li>
          <li>Industrial energy management</li>
          </ul>
          <ol>
          <li>Boiler and boiler equipment maintenance</li>
          <li>Repair and maintenance of mechanical facilities</li>
          <li>Installation of HVAC and Air conditioning facilities and services</li>
          </ol>
          <ul>
          <li>Repair and maintenance of refrigeration</li>
          <li>Repair and maintenance of compressors</li>
          <li>Repair and maintenance of agro-machines and equipment</li>
          </ul>
          <ol>
          <li>Repair and maintenance of elevators in buildings and airports</li>
          </ol>
          <ul>
          <li>Repair and maintenance of marine equipment</li>
          <li>Installation, repair and maintenance of textile machines</li>
          <li>Welding and fabrication of all mechanical activities</li>
          <li>Laboratory material testing.</li>
          </ul>
          <p>&nbsp;</p>
          </li>
          </ul>
          <ol>
          <li>Construction of Water Harvesting Tank at Mahango Orphanage Center &ndash; Igurusi- Mbarali &ndash; Mbeya &ndash;<strong> Completed </strong></li>
          <li>Proposed construction of Maternity Ward at Regional Referral Hospital in Songea Municipality Ruvuma &ndash;Phase II &ndash; Ruvuma &ndash; <strong>Final Stages</strong></li>
          </ol>
          <ul>
          <li>Proposed Rehabilitation of Regional Commissioner&rsquo;s Office Buildings &ndash; Ruvuma - <strong>Final Stages</strong></li>
          </ul>
          <ol>
          <li>The Proposed Construction of the Healthy Facilities (Maternity Wing, Radiology and ICU Building, Surgical, Medical and Orthopedically Wards Block, Laboratory, Laundry, and Five (5) Staff Houses) &ndash; Njombe &ndash; <strong>Initial Stages</strong></li>
          <li>The Proposed Construction of the Healthy Facilities (OPD and Laboratory Buildings) &ndash; Songwe - <strong>Initial Stages</strong></li>
          <li>Proposed Construction of Mother and Child Health Building at Mwananyamala Regional Referral Hospital - DSM - <strong>Initial Stages</strong></li>
          </ol>
          <ul>
          <li>Proposed Construction of the Main Gate at MUST Rukwa Campus College &ndash; RUKWA &ndash; <strong>In Progress </strong></li>
          </ul>
          </li>
          </ul>
          </li>
          </ul>
          </ul>
          </ul>
          </ul>
          </ul>','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => 'P.O.Box 131, Mbeya - Tanzania.','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:47:33','banner' => '','designation_id' => '4'),
            array('id' => '11','name' => 'Directorate of ICT Services and Statistics','short_name' => 'DICTSS','biography' => '<p style="text-align: justify;">The Directorate of Information and Communication Technology Services and Statistics (DICTSS) oversee all matters pertaining to ICT and Statistics for the University. It is dedicated for providing Information and Communication Technology (ICT) services to the Staffs &amp; Students as well as Statistics for the entire University.&nbsp;The DICTSS is responsible for planning, managing and executing all ICT functions and Statistics of MUST. The Directorate consists of three Departments namely Department of Computer Maintenance, Networking and Troubleshooting, Department of Software Systems, and Department of Statistics.</p>
          <p style="text-align: justify;">. Among others DICTSS is responsible for</p>
          <ol style="text-align: justify;">
          <li>The implementation of ICT policies, strategies and standards;</li>
          <li>Promoting best practices to acquisition, use, and disposal of ICT resources;</li>
          <li>Contribution towards sustainability of the Centre in order to enable effective execution of its mandate</li>
          <li>Coordinating and leading in resource mobilization from other sources of funding for the ICT strategies implementation</li>
          </ol>
          <p style="text-align: justify;"><br />Among of the services that are offered by DICTSS to the university include:-</p>
          <ul>
          <li style="text-align: justify;">Users Support</li>
          <li style="text-align: justify;">Email services to staff and students</li>
          <li style="text-align: justify;">LAN and WLAN(wireless LAN) installation and Maintenance</li>
          <li style="text-align: justify;">Computer&nbsp; Maintenance and Repair</li>
          <li style="text-align: justify;">Website administration and hosting</li>
          <li style="text-align: justify;">Systems Administration</li>
          <li style="text-align: justify;">Sysytem Development</li>
          <li style="text-align: justify;">Other ICT related activities at MUST</li>
          <li style="text-align: justify;">Statistics of the University</li>
          </ul>','email' => 'dictss@mustnet.ac.tz','phone_1' => '0753141112','phone_2' => '+2550252503016','fax' => '','address' => 'P.O.Box 131 Mbeya, Iyunga Industrial Area','status' => 'Active','is_deleted' => '','created_at' => '2019-04-11 17:49:13','banner' => '','designation_id' => '5'),
            array('id' => '12','name' => 'Directorate of Quality Assurance','short_name' => 'DQA','biography' => '<p>The Directorate of Quality Assurance started its operation in 2014 as Directorate of Quality Assurence and Quality Control. Currently the Directorate is known as Directorate of Quality Assurance.&nbsp; The Directorate fall under Deputy Vice Chancellor-Academic Research and Consultancy (DVC-ARC).</p>
          <p>The Directorate operates using three Coordinators:</p>
          <ol>
          <li>Programme&nbsp; Assessment Coordinator</li>
          <li>Quality Assurance Coordinator</li>
          <li>Quality Control - Monitoring and Evaluation Coordinator</li>
          </ol>
          <p>FUNCTIONS OF DIRECTORATE OF&nbsp; QUALITY ASSURANCE</p>
          <ol style="list-style-type: lower-roman;">
          <li>Developing quality assurance processes and procedures to ensure that the quality of provision and standards of University awards are maintained;</li>
          <li>Setting clear &nbsp;and &nbsp;explicit &nbsp;performance &nbsp;standards &nbsp;in &nbsp;all &nbsp;aspects &nbsp;of &nbsp;University functions. &nbsp;These &nbsp;standards&nbsp; are&nbsp; points &nbsp;of &nbsp;reference &nbsp;which &nbsp;will &nbsp;guide &nbsp;quality reviews;</li>
          <li>Monitoring the implementation of QA processes as per the set standards;</li>
          <li>Spearheading and coordinating internal self-evaluation of &nbsp;both &nbsp;academic &nbsp;and support provision in the University.</li>
          <li>Analysis of self-evaluation reports and identification of issues arising therefrom that need attention for improvement;</li>
          <li>Facilitation of external evaluation of the University and accreditation of academic programmes by statutory and professional bodies;</li>
          <li>Monitoring implementation &nbsp;of &nbsp;recommendations &nbsp;arising &nbsp;from &nbsp;internal &nbsp;and external evaluation;</li>
          <li>Monitoring trends in QA matters regionally and internationally and advising the University.</li>
          <li>Synthesis of &nbsp;new &nbsp;approaches &nbsp;to &nbsp;QA &nbsp;matters &nbsp;informed &nbsp;by&nbsp; research &nbsp;in &nbsp;higher education matters.</li>
          <li>Prepare annual and long-term activity plans which will be presented to the University Committee of QA and thereafter submitted to the Senate or Council.</li>
          <li>Provide advice and guide the University organs on quality assurance issues.</li>
          <li>Establish the network for QA and improvement at the University and beyond.</li>
          <li>Building capacity in the area of QA for the University&rsquo;s staff and students communities.</li>
          <li>Recommend appropriate budgets for QA issues at University</li>
          </ol>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-19 11:41:36','banner' => '','designation_id' => '3'),
            array('id' => '13','name' => 'Procurement Management Unit','short_name' => 'PMU','biography' => '','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-19 11:44:22','banner' => '','designation_id' => '3'),
            array('id' => '14','name' => 'Public Relations and Communications Unit','short_name' => 'PRCo','biography' => '<p><strong>PUBLIC RELATIONS AND COMMUNICATIONS UNIT</strong></p>
          <p>Welcome to Mbeya University of Science and Technology communication Unit. This Unit was established in 2007 and started operating officially in the same year. It was formed purposely to facilitate communication internally and externally.</p>
          <p>The Unit has two sub Units one is Communication sub Unit which has the following duties; To report public criticisms and complaints to the supervisor, organizes official functions, tours and protocol &nbsp;&nbsp;&nbsp;matters, execute exhibition activities (e.g. trade fairs, open days exhibitions) Analyses public criticisms, complaints, to produce Radio and TV program.</p>
          <p>Also the sub Unit Compiles news and ensures production of MUST Newsletter and other house journals, Compiles information, prepares speeches and issues press release. Also arranges for radio talk shows/interviews for senior University officials.</p>
          <p>&nbsp;</p>
          <p>The second Sub Unit is the <strong>104.5 MHz </strong><strong>MUST FM ,</strong> the radio was established in June 2018 with the following duties; To prepare the Content of Radio programs daily, To prepare the quality programs for public education/information ,To guarantee the quality of delivery of live radio programs and recorded programs, To support the preparations of quality clients program to be broadcast through Radio, To conduct Research and surveys in preparation of scripts, features and special programs ,To&nbsp; analyze&nbsp; broadcasting trends and development and To broadcast all university programs.</p>
          <p>The <strong>MUST FM Radio</strong> has the following programs;</p>
          <p>&nbsp;</p>
          <table width="600">
          <tbody>
          <tr>
          <td width="44">
          <p>S/N</p>
          </td>
          <td width="316">
          <p>PROGRAM</p>
          </td>
          <td width="240">
          <p>TIME</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>01.</p>
          </td>
          <td width="316">
          <p>HELLO AFRICA</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>5.30 AM- 09.55 AM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>02.</p>
          </td>
          <td width="316">
          <p>LADHA YA LEO</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>10.00 AM &ndash; 12.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>03.</p>
          </td>
          <td width="316">
          <p>MIKITO&nbsp; 104.5 (mikito one o four five)</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>13.OO PM &ndash; 15.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>04.</p>
          </td>
          <td width="316">
          <p>CITY DRIVE</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>16.00 PM &ndash;18.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>05.</p>
          </td>
          <td width="316">
          <p>ULINGO WA HABARI</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>19.00 PM &ndash; 20.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>06.</p>
          </td>
          <td width="316">
          <p>MICHEZO</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>21.00 PM &ndash; 21.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>07.</p>
          </td>
          <td width="316">
          <p>SLOW MUSIC</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>22.00PM-22.55 PM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>08.</p>
          </td>
          <td width="316">
          <p>ROMANTIC&nbsp; TIME</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>23 .00 PM &ndash; 00.55 AM</p>
          </td>
          </tr>
          <tr>
          <td width="44">
          <p>09.</p>
          </td>
          <td width="316">
          <p>HOT MIX ZONE</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          </td>
          <td width="240">
          <p>01.00 AM &ndash;5.30 AM</p>
          </td>
          </tr>
          </tbody>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>','email' => 'dmsakazi@mustnet.ac.tz','phone_1' => '','phone_2' => '','fax' => '','address' => 'P.O.Box 131, MBEYA','status' => 'Inactive','is_deleted' => '','created_at' => '2019-04-19 11:45:29','banner' => '','designation_id' => '3'),
            array('id' => '15','name' => 'Internal Audit Unit','short_name' => 'IA','biography' => '<p><strong>REPORTING</strong></p>
          <p>Internal Audit function reports administratively directly to the Vice Chancellor and functionally to the Audit Committee.</p>
          <p>&nbsp;</p>
          <p>The dual reporting is for the purpose of availing the Internal Audit Unit the independence and freedom required to perform their internal audit responsibilities in an unbiased manner.</p>
          <p>&nbsp;</p>
          <p><strong>PURPOSE, RESPONSIBILITIES AND AUTHORITY</strong></p>
          <p>The purpose, responsibilities and authority of the Internal Audit function are set out in the Internal Audit Charter of the University as approved by the Council.</p>
          <p>&nbsp;</p>
          <p><strong>STAFFING</strong></p>
          <p>The Unit is staffed by four (4) officers and a secretary.</p>
          <p>The Internal Audit Unit is headed by the Chief Internal Auditor, who is assisted by three officers.</p>
          <p>1. Chief Internal Auditor&nbsp; &nbsp; &nbsp; &nbsp; Mr. Deusdedit Patrick Sinda</p>
          <p>2. Senior Internal Auditor II&nbsp; &nbsp; Ms. Joyce Hiluka</p>
          <p>3. Internal Auditor I&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ms. Caroline Barozi</p>
          <p>4. Internal Auditor I&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mr. John C. Marindo</p>
          <p>5. Secretary&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ms. Sarah Mbega</p>
          <p>&nbsp;</p>
          <p><strong>RELATIONSHIP WITH OTHER UNIVERSITY ORGANS</strong></p>
          <p>&nbsp;The Chief Internal Auditor is a member of the following organs of the University.</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; a) The Audit Committee of the Council.</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Chief Internal Auditor is the Secretary of the Audit Committee of the Council</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Audit Committee is required to hold four regular meetings annually, with one meeting being held after every quarter.</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;b) The Chief Internal Auditor is a standing invitee to the following organs</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(i) The Finance, Planning and Development Committee.</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(ii) The Council, where he presents reports from the Audit Committee.</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;c) He is a member of the Principals, Deans and Directors Committee; and a member of the Budget committee.</p>
          <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;d) He is also a member of the University SENATE.</p>','email' => 'internal.audit@mustnet.ac.tz','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-19 11:46:50','banner' => '','designation_id' => '3'),
            array('id' => '16','name' => 'Legal Services Unit','short_name' => 'LSU','biography' => '','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => '','created_at' => '2019-04-19 11:47:42','banner' => '','designation_id' => '3'),
            array('id' => '17','name' => 'Directorate of MISTECO','short_name' => 'Ivor  Ndimbo','biography' => '<p style="text-align: justify;">MIST Engineering Contractors (MISTECO) Ltd is an incorporated company under the Company Ordinance CAP 212, and registered with the registrar of companies, BRELA. It has a Class IV registration to undertake Civil, Building, Electrical, and Mechanical works from the National Contractors Registration Board (CRB) since March 2017. The Company has its headquarters and offices located at the Mbeya University of Science and Technology (MUST) Block 6, College of Education Building, Mbeya Campus. The company is owned by Mbeya University of Science and Technology (MUST). It constitutes the Board of Directors and other personnel, and run by the Managing Director and Project Manager. The company has competent professionals with the aforementioned fields of specialization. With the use of the abundant modern equipment (possessed by the University) the constructions services i.e&nbsp;&nbsp; all civil, electrical, mechanical and building works, are available with less costs since hiring of construction equipment will be minimum.</p>
          <ul>
          <li style="text-align: justify;"><strong>VISION AND MISSION</strong></li>
          </ul>
          <ul style="text-align: justify;">
          <li><a name="_Toc418630836"></a> <strong>Vision</strong></li>
          </ul>
          <p style="text-align: justify;">To become the most recognized professional service provider by delivering high quality and excellent construction services in Engineering, and Technology, both locally and globally</p>
          <ul style="text-align: justify;">
          <li><a name="_Toc418630837"></a> <strong>Mission</strong></li>
          </ul>
          <p style="text-align: justify;">To provide high quality construction services particularly in Engineering and Technology through:-</p>
          <ol style="text-align: justify;">
          <li>Nurturing a conducive environment for attracting construction projects</li>
          <li>Coordinating construction projects across the University</li>
          </ol>
          <ul>
          <li style="text-align: justify;">Meeting societal challenges through transferring appropriate technologies</li>
          <li style="text-align: justify;">
          <ul>
          <li><strong>COMPANY&rsquo;S MAJOR AREAS OF ENGAGEMENT</strong></li>
          </ul>
          <p>The Company&rsquo;s area of engagement is divided into four sections; civil, building, electrical and mechanical:</p>
          <p>&nbsp;</p>
          <ul>
          <li><strong>Civil Department</strong></li>
          </ul>
          <p>Under civil, the company can stretch its services to:</p>
          <ol>
          <li>Construction of road works.</li>
          <li>Road maintenance.</li>
          </ol>
          <ul>
          <li>Construction of bridges.</li>
          </ul>
          <ol>
          <li>Construction of culverts.</li>
          <li>Irrigation schemes.</li>
          <li>Construction of water supply schemes.</li>
          </ol>
          <ul>
          <li>Construction of drainage structures.</li>
          </ul>
          <p>&nbsp;</p>
          <ul>
          <li><strong>Building Department</strong></li>
          </ul>
          <p>Under building, the company can offer the following services</p>
          <ol>
          <li>Construction of high rise and low rise buildings</li>
          <li>Construction of office buildings</li>
          </ol>
          <ul>
          <li>Construction of commercial buildings</li>
          </ul>
          <ol>
          <li>Construction of residential and apartments</li>
          <li>Construction of warehouses and storage facilities</li>
          <li>Renovation and remodeling of the dilapidated buildings/structures ranging from residential, offices and commercial buildings.</li>
          </ol>
          <ul>
          <li>Construction of interiors; office partitioning, cabinet installations and all interior works</li>
          </ul>
          <p>&nbsp;</p>
          <ul>
          <li><strong>Electrical Department</strong></li>
          </ul>
          <p>Under electrical, the company can do the following</p>
          <ol>
          <li>Design and installation of electrical power layout in both domestic and commercial premises</li>
          <li>Installation of electrical machinery and equipment in both domestic and industries</li>
          </ol>
          <ul>
          <li>Construction of electrical substations</li>
          </ul>
          <ol>
          <li>Construction of service and distribution lines (both overhead and underground)</li>
          <li>Construction of transmission lines (both LV &amp; HV), including erection of towers and tower foundations</li>
          <li>Installation of renewable energy stands (Solar, Wind, Biogas )</li>
          </ol>
          <ul>
          <li>Installation of Telecommunication systems</li>
          <li>Installation and repair of different air conditioning systems</li>
          </ul>
          <ol>
          <li>TV and Computer maintenance and troubleshooting</li>
          <li>Motor and Transformer rewinding</li>
          <li>Transformer testing and Commissioning</li>
          </ol>
          <ul>
          <li>Provide Bill Of Quantity (BOQ) of electrical machinery, equipment and protection</li>
          <li>Installation and repair of Electronics machinery and equipment</li>
          <li>Maintenance and repair of all the above mentioned</li>
          </ul>
          <p>&nbsp;</p>
          <ul>
          <li><strong>Mechanical Department</strong></li>
          </ul>
          <p>Under mechanical the company can do the following:</p>
          <ol>
          <li>Maintenance and repair of motor vehicles</li>
          <li>Panel biting and spray painting for damaged bodies of vehicles.</li>
          </ol>
          <ul>
          <li>Diesel injector pump services</li>
          </ul>
          <ol>
          <li>Motor vehicle Wheel balancing</li>
          <li>Motor vehicles trouble shooting diagnosis</li>
          <li>Crane services</li>
          </ol>
          <ul>
          <li>Energy auditing in buildings</li>
          <li>Industrial energy management</li>
          </ul>
          <ol>
          <li>Boiler and boiler equipment maintenance</li>
          <li>Repair and maintenance of mechanical facilities</li>
          <li>Installation of HVAC and Air conditioning facilities and services</li>
          </ol>
          <ul>
          <li>Repair and maintenance of refrigeration</li>
          <li>Repair and maintenance of compressors</li>
          <li>Repair and maintenance of agro-machines and equipment</li>
          </ul>
          <ol>
          <li>Repair and maintenance of elevators in buildings and airports</li>
          </ol>
          <ul>
          <li>Repair and maintenance of marine equipment</li>
          <li>Installation, repair and maintenance of textile machines</li>
          <li>Welding and fabrication of all mechanical activities</li>
          <li>Laboratory material testing.</li>
          </ul>
          <p>&nbsp;</p>
          <ul>
          <li><strong>PROJECTS</strong> <strong>EXECUTE TO-DATE</strong></li>
          </ul>
          <p>&nbsp;</p>
          <ol>
          <li>Construction of Water Harvesting Tank at Mahango Orphanage Center &ndash; Igurusi- Mbarali &ndash; Mbeya &ndash;<strong> Completed </strong></li>
          <li>Proposed construction of Maternity Ward at Regional Referral Hospital in Songea Municipality Ruvuma &ndash;Phase II &ndash; Ruvuma &ndash; <strong>Final Stages</strong></li>
          </ol>
          <ul>
          <li>Proposed Rehabilitation of Regional Commissioner&rsquo;s Office Buildings &ndash; Ruvuma - <strong>Final Stages</strong></li>
          </ul>
          <ol>
          <li>The Proposed Construction of the Healthy Facilities (Maternity Wing, Radiology and ICU Building, Surgical, Medical and Orthopedically Wards Block, Laboratory, Laundry, and Five (5) Staff Houses) &ndash; Njombe &ndash; <strong>Initial Stages</strong></li>
          <li>The Proposed Construction of the Healthy Facilities (OPD and Laboratory Buildings) &ndash; Songwe - <strong>Initial Stages</strong></li>
          <li>Proposed Construction of Mother and Child Health Building at Mwananyamala Regional Referral Hospital - DSM - <strong>Initial Stages</strong></li>
          </ol>
          <ul>
          <li>Proposed Construction of the Main Gate at MUST Rukwa Campus College &ndash; RUKWA &ndash; <strong>In Progress </strong></li>
          </ul>
          </li>
          </ul>','email' => 'indimbo@mustnet.ac.tz','phone_1' => 'O754377092','phone_2' => '','fax' => '','address' => 'MUST','status' => 'Active','is_deleted' => NULL,'created_at' => '2019-04-28 13:38:03','banner' => NULL,'designation_id' => '4'),
            array('id' => '20','name' => 'Directorate of Rural Technology Park','short_name' => 'DRTP','biography' => '','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Active','is_deleted' => NULL,'created_at' => '2019-09-12 12:14:59','banner' => NULL,'designation_id' => '4'),
            array('id' => '21','name' => 'Directorate of Public Services and External Links','short_name' => 'DPS-EL','biography' => '<p><strong>WELCOMING NOTE</strong></p>
          <p>Welcome to the Directorate of Public Services &amp; External Links (DPSEL) of Mbeya University of Science and Technology. We are coordinating the use of University expertise and other resources to promote collaborative partnerships, provide comprehensive consultancy, and outreach services to meet national and international challenges through effective entrepreneurial and practical oriented training. It is our focus and desire to provide a close, effective and sustainable working relationship with communities, governments and other partners in the entire context of changing lives of people/community. The directorate of Public Services and External Links is made up of four (4) departments: <em>Consultancy, Outreach Services and Marketing, External Links, and Industrial Linkage and Labour Market</em>, each of which works towards Directorate&rsquo;s common objectives. To deliver quality services to all stakeholders with efficiency, effectiveness and the highest standards of courtesy and integrity is our strategic mandate.</p>
          <p><strong>We thank you for sharing your special time with us.</strong></p>
          <p>Dr. Buberwa M. Tibesigwa</p>
          <p><strong>Ag. DPSEL</strong></p>
          <p>&nbsp;</p>
          <p><strong>OUR VISION</strong></p>
          <p>To become the leading center of excellence in providing consultancy and outreach services in Science and Technology.</p>
          <p><strong>OUR MISSION</strong></p>
          <p>To provide consultancy services and promote University&rsquo;s outreach activities for broader dissemination of innovations and technologies.</p>
          <p><strong>FUNCTIONS OF DPSEL</strong>:</p>
          <ol>
          <li>To promote the University outreach activities through reliable and effective communication media to key stakeholders</li>
          <li>To promote mutual collaboration, partnership and networking with local and international stakeholders in outreach activities.</li>
          <li>To solicit resources from external sources to support implementation of outreach activities.</li>
          <li>To coordinate and solicit consultancies for the University;</li>
          <li>To mobilize consultants across the departments for the university&rsquo;s research activities;</li>
          <li>To ensure policies and guidelines for consultancy are adhered to;</li>
          <li>To conduct market intelligence for MUST;</li>
          <li>To coordinate and administer all outreach services and marketing activities;</li>
          <li>To market the University\'s corporate image to both the internal and external publics;</li>
          <li>To coordinating international and national collaborations between MUST and its partners;</li>
          <li>To promote collaborative public services links with other institutions and donors;</li>
          <li>To organize and conduct conference services, and symposia;</li>
          <li>To establish exchange projects and programs, joint ventures emanating from national and international linkages;</li>
          <li>To coordinate admission of International Students;</li>
          <li>To maintain database of Students&rsquo; Industrial Practical Training;</li>
          <li>To handle all matters related to fieldwork and students research programs; and</li>
          <li>To co-ordinate conduct of Industrial Linkages for students.</li>
          </ol>','email' => 'dpsel@mustnet.ac.tz','phone_1' => '+255658359685','phone_2' => '+2550252503016','fax' => '','address' => 'Mbeya, Iyunga Industrial Area','status' => 'Active','is_deleted' => NULL,'created_at' => '2019-09-12 12:17:17','banner' => NULL,'designation_id' => '4'),
            array('id' => '22','name' => 'Centre for Innovation and Technology Transfer 1','short_name' => 'CITT','biography' => '','email' => '','phone_1' => '','phone_2' => '','fax' => '','address' => '','status' => 'Inactive','is_deleted' => NULL,'created_at' => '2019-09-27 12:00:15','banner' => NULL,'designation_id' => '4')
          );

        $stations = [
            'MUST Main Campus', 'Must Rukwa Campus'
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate([
                'name' => $post['name']
            ]);
        }

        foreach ($directorates as $directorate) {
            Directorate::firstOrCreate([
                'name' => $directorate['name'],
                'short_name' => $directorate['short_name']
            ]);
        }

        foreach ($stations as $station) {
            Station::firstOrCreate([
                'name' => $station
            ]);
        }
    }
}
