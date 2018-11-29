<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        $countries = array(
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 1,'code' => 'AF' ,'name' => "Afghanistan",'phonecode' => 93),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 2,'code' => 'AL' ,'name' => "Albania",'phonecode' => 355),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 3,'code' => 'DZ' ,'name' => "Algeria",'phonecode' => 213),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 4,'code' => 'AS' ,'name' => "American Samoa",'phonecode' => 1684),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 5,'code' => 'AD' ,'name' => "Andorra",'phonecode' => 376),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 6,'code' => 'AO' ,'name' => "Angola",'phonecode' => 244),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 7,'code' => 'AI' ,'name' => "Anguilla",'phonecode' => 1264),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 8,'code' => 'AQ' ,'name' => "Antarctica",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 9,'code' => 'AG' ,'name' => "Antigua And Barbuda",'phonecode' => 1268),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 10,'code' => 'AR','name' => "Argentina",'phonecode' => 54),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 11,'code' => 'AM','name' => "Armenia",'phonecode' => 374),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 12,'code' => 'AW','name' => "Aruba",'phonecode' => 297),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 13,'code' => 'AU','name' => "Australia",'phonecode' => 61),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 14,'code' => 'AT','name' => "Austria",'phonecode' => 43),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 15,'code' => 'AZ','name' => "Azerbaijan",'phonecode' => 994),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 16,'code' => 'BS','name' => "Bahamas The",'phonecode' => 1242),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 17,'code' => 'BH','name' => "Bahrain",'phonecode' => 973),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 18,'code' => 'BD','name' => "Bangladesh",'phonecode' => 880),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 19,'code' => 'BB','name' => "Barbados",'phonecode' => 1246),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 20,'code' => 'BY','name' => "Belarus",'phonecode' => 375),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 21,'code' => 'BE','name' => "Belgium",'phonecode' => 32),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 22,'code' => 'BZ','name' => "Belize",'phonecode' => 501),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 23,'code' => 'BJ','name' => "Benin",'phonecode' => 229),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 24,'code' => 'BM','name' => "Bermuda",'phonecode' => 1441),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 25,'code' => 'BT','name' => "Bhutan",'phonecode' => 975),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 26,'code' => 'BO','name' => "Bolivia",'phonecode' => 591),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 27,'code' => 'BA','name' => "Bosnia and Herzegovina",'phonecode' => 387),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 28,'code' => 'BW','name' => "Botswana",'phonecode' => 267),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 29,'code' => 'BV','name' => "Bouvet Island",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 30,'code' => 'BR','name' => "Brazil",'phonecode' => 55),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 31,'code' => 'IO','name' => "British Indian Ocean Territory",'phonecode' => 246),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 32,'code' => 'BN','name' => "Brunei",'phonecode' => 673),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 33,'code' => 'BG','name' => "Bulgaria",'phonecode' => 359),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 34,'code' => 'BF','name' => "Burkina Faso",'phonecode' => 226),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 35,'code' => 'BI','name' => "Burundi",'phonecode' => 257),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 36,'code' => 'KH','name' => "Cambodia",'phonecode' => 855),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 37,'code' => 'CM','name' => "Cameroon",'phonecode' => 237),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 38,'code' => 'CA','name' => "Canada",'phonecode' => 1),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 39,'code' => 'CV','name' => "Cape Verde",'phonecode' => 238),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 40,'code' => 'KY','name' => "Cayman Islands",'phonecode' => 1345),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 41,'code' => 'CF','name' => "Central African Republic",'phonecode' => 236),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 42,'code' => 'TD','name' => "Chad",'phonecode' => 235),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 43,'code' => 'CL','name' => "Chile",'phonecode' => 56),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 44,'code' => 'CN','name' => "China",'phonecode' => 86),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 45,'code' => 'CX','name' => "Christmas Island",'phonecode' => 61),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 46,'code' => 'CC','name' => "Cocos (Keeling) Islands",'phonecode' => 672),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 47,'code' => 'CO','name' => "Colombia",'phonecode' => 57),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 48,'code' => 'KM','name' => "Comoros",'phonecode' => 269),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 49,'code' => 'CG','name' => "Congo",'phonecode' => 242),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 50,'code' => 'CD','name' => "Congo The Democratic Republic Of The",'phonecode' => 242),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 51,'code' => 'CK','name' => "Cook Islands",'phonecode' => 682),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 52,'code' => 'CR','name' => "Costa Rica",'phonecode' => 506),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 53,'code' => 'CI','name' => "Cote D Ivoire (Ivory Coast)",'phonecode' => 225),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 54,'code' => 'HR','name' => "Croatia (Hrvatska)",'phonecode' => 385),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 55,'code' => 'CU','name' => "Cuba",'phonecode' => 53),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 56,'code' => 'CY','name' => "Cyprus",'phonecode' => 357),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 57,'code' => 'CZ','name' => "Czech Republic",'phonecode' => 420),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 58,'code' => 'DK','name' => "Denmark",'phonecode' => 45),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 59,'code' => 'DJ','name' => "Djibouti",'phonecode' => 253),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 60,'code' => 'DM','name' => "Dominica",'phonecode' => 1767),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 61,'code' => 'DO','name' => "Dominican Republic",'phonecode' => 1809),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 62,'code' => 'TP','name' => "East Timor",'phonecode' => 670),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 63,'code' => 'EC','name' => "Ecuador",'phonecode' => 593),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 64,'code' => 'EG','name' => "Egypt",'phonecode' => 20),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 65,'code' => 'SV','name' => "El Salvador",'phonecode' => 503),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 66,'code' => 'GQ','name' => "Equatorial Guinea",'phonecode' => 240),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 67,'code' => 'ER','name' => "Eritrea",'phonecode' => 291),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 68,'code' => 'EE','name' => "Estonia",'phonecode' => 372),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 69,'code' => 'ET','name' => "Ethiopia",'phonecode' => 251),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 70,'code' => 'XA','name' => "External Territories of Australia",'phonecode' => 61),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 71,'code' => 'FK','name' => "Falkland Islands",'phonecode' => 500),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 72,'code' => 'FO','name' => "Faroe Islands",'phonecode' => 298),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 73,'code' => 'FJ','name' => "Fiji Islands",'phonecode' => 679),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 74,'code' => 'FI','name' => "Finland",'phonecode' => 358),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 75,'code' => 'FR','name' => "France",'phonecode' => 33),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 76,'code' => 'GF','name' => "French Guiana",'phonecode' => 594),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 77,'code' => 'PF','name' => "French Polynesia",'phonecode' => 689),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 78,'code' => 'TF','name' => "French Southern Territories",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 79,'code' => 'GA','name' => "Gabon",'phonecode' => 241),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 80,'code' => 'GM','name' => "Gambia The",'phonecode' => 220),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 81,'code' => 'GE','name' => "Georgia",'phonecode' => 995),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 82,'code' => 'DE','name' => "Germany",'phonecode' => 49),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 83,'code' => 'GH','name' => "Ghana",'phonecode' => 233),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 84,'code' => 'GI','name' => "Gibraltar",'phonecode' => 350),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 85,'code' => 'GR','name' => "Greece",'phonecode' => 30),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 86,'code' => 'GL','name' => "Greenland",'phonecode' => 299),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 87,'code' => 'GD','name' => "Grenada",'phonecode' => 1473),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 88,'code' => 'GP','name' => "Guadeloupe",'phonecode' => 590),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 89,'code' => 'GU','name' => "Guam",'phonecode' => 1671),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 90,'code' => 'GT','name' => "Guatemala",'phonecode' => 502),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 91,'code' => 'XU','name' => "Guernsey and Alderney",'phonecode' => 44),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 92,'code' => 'GN','name' => "Guinea",'phonecode' => 224),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 93,'code' => 'GW','name' => "Guinea-Bissau",'phonecode' => 245),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 94,'code' => 'GY','name' => "Guyana",'phonecode' => 592),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 95,'code' => 'HT','name' => "Haiti",'phonecode' => 509),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 96,'code' => 'HM','name' => "Heard and McDonald Islands",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 97,'code' => 'HN','name' => "Honduras",'phonecode' => 504),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 98,'code' => 'HK','name' => "Hong Kong S.A.R.",'phonecode' => 852),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 99,'code' => 'HU','name' => "Hungary",'phonecode' => 36),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 100,'code' => 'IS','name' => "Iceland",'phonecode' => 354),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 101,'code' => 'IN','name' => "India",'phonecode' => 91),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 102,'code' => 'ID','name' => "Indonesia",'phonecode' => 62),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 103,'code' => 'IR','name' => "Iran",'phonecode' => 98),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 104,'code' => 'IQ','name' => "Iraq",'phonecode' => 964),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 105,'code' => 'IE','name' => "Ireland",'phonecode' => 353),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 106,'code' => 'IL','name' => "Israel",'phonecode' => 972),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 107,'code' => 'IT','name' => "Italy",'phonecode' => 39),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 108,'code' => 'JM','name' => "Jamaica",'phonecode' => 1876),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 109,'code' => 'JP','name' => "Japan",'phonecode' => 81),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 110,'code' => 'XJ','name' => "Jersey",'phonecode' => 44),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 111,'code' => 'JO','name' => "Jordan",'phonecode' => 962),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 112,'code' => 'KZ','name' => "Kazakhstan",'phonecode' => 7),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 113,'code' => 'KE','name' => "Kenya",'phonecode' => 254),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 114,'code' => 'KI','name' => "Kiribati",'phonecode' => 686),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 115,'code' => 'KP','name' => "Korea North",'phonecode' => 850),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 116,'code' => 'KR','name' => "Korea South",'phonecode' => 82),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 117,'code' => 'KW','name' => "Kuwait",'phonecode' => 965),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 118,'code' => 'KG','name' => "Kyrgyzstan",'phonecode' => 996),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 119,'code' => 'LA','name' => "Laos",'phonecode' => 856),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 120,'code' => 'LV','name' => "Latvia",'phonecode' => 371),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 121,'code' => 'LB','name' => "Lebanon",'phonecode' => 961),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 122,'code' => 'LS','name' => "Lesotho",'phonecode' => 266),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 123,'code' => 'LR','name' => "Liberia",'phonecode' => 231),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 124,'code' => 'LY','name' => "Libya",'phonecode' => 218),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 125,'code' => 'LI','name' => "Liechtenstein",'phonecode' => 423),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 126,'code' => 'LT','name' => "Lithuania",'phonecode' => 370),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 127,'code' => 'LU','name' => "Luxembourg",'phonecode' => 352),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 128,'code' => 'MO','name' => "Macau S.A.R.",'phonecode' => 853),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 129,'code' => 'MK','name' => "Macedonia",'phonecode' => 389),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 130,'code' => 'MG','name' => "Madagascar",'phonecode' => 261),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 131,'code' => 'MW','name' => "Malawi",'phonecode' => 265),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 132,'code' => 'MY','name' => "Malaysia",'phonecode' => 60),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 133,'code' => 'MV','name' => "Maldives",'phonecode' => 960),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 134,'code' => 'ML','name' => "Mali",'phonecode' => 223),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 135,'code' => 'MT','name' => "Malta",'phonecode' => 356),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 136,'code' => 'XM','name' => "Man (Isle of)",'phonecode' => 44),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 137,'code' => 'MH','name' => "Marshall Islands",'phonecode' => 692),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 138,'code' => 'MQ','name' => "Martinique",'phonecode' => 596),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 139,'code' => 'MR','name' => "Mauritania",'phonecode' => 222),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 140,'code' => 'MU','name' => "Mauritius",'phonecode' => 230),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 141,'code' => 'YT','name' => "Mayotte",'phonecode' => 269),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 142,'code' => 'MX','name' => "Mexico",'phonecode' => 52),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 143,'code' => 'FM','name' => "Micronesia",'phonecode' => 691),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 144,'code' => 'MD','name' => "Moldova",'phonecode' => 373),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 145,'code' => 'MC','name' => "Monaco",'phonecode' => 377),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 146,'code' => 'MN','name' => "Mongolia",'phonecode' => 976),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 147,'code' => 'MS','name' => "Montserrat",'phonecode' => 1664),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 148,'code' => 'MA','name' => "Morocco",'phonecode' => 212),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 149,'code' => 'MZ','name' => "Mozambique",'phonecode' => 258),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 150,'code' => 'MM','name' => "Myanmar",'phonecode' => 95),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 151,'code' => 'NA','name' => "Namibia",'phonecode' => 264),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 152,'code' => 'NR','name' => "Nauru",'phonecode' => 674),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 153,'code' => 'NP','name' => "Nepal",'phonecode' => 977),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 154,'code' => 'AN','name' => "Netherlands Antilles",'phonecode' => 599),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 155,'code' => 'NL','name' => "Netherlands The",'phonecode' => 31),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 156,'code' => 'NC','name' => "New Caledonia",'phonecode' => 687),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 157,'code' => 'NZ','name' => "New Zealand",'phonecode' => 64),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 158,'code' => 'NI','name' => "Nicaragua",'phonecode' => 505),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 159,'code' => 'NE','name' => "Niger",'phonecode' => 227),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 160,'code' => 'NG','name' => "Nigeria",'phonecode' => 234),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 161,'code' => 'NU','name' => "Niue",'phonecode' => 683),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 162,'code' => 'NF','name' => "Norfolk Island",'phonecode' => 672),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 163,'code' => 'MP','name' => "Northern Mariana Islands",'phonecode' => 1670),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 164,'code' => 'NO','name' => "Norway",'phonecode' => 47),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 165,'code' => 'OM','name' => "Oman",'phonecode' => 968),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 166,'code' => 'PK','name' => "Pakistan",'phonecode' => 92),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 167,'code' => 'PW','name' => "Palau",'phonecode' => 680),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 168,'code' => 'PS','name' => "Palestinian Territory Occupied",'phonecode' => 970),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 169,'code' => 'PA','name' => "Panama",'phonecode' => 507),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 170,'code' => 'PG','name' => "Papua new Guinea",'phonecode' => 675),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 171,'code' => 'PY','name' => "Paraguay",'phonecode' => 595),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 172,'code' => 'PE','name' => "Peru",'phonecode' => 51),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 173,'code' => 'PH','name' => "Philippines",'phonecode' => 63),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 174,'code' => 'PN','name' => "Pitcairn Island",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 175,'code' => 'PL','name' => "Poland",'phonecode' => 48),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 176,'code' => 'PT','name' => "Portugal",'phonecode' => 351),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 177,'code' => 'PR','name' => "Puerto Rico",'phonecode' => 1787),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 178,'code' => 'QA','name' => "Qatar",'phonecode' => 974),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 179,'code' => 'RE','name' => "Reunion",'phonecode' => 262),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 180,'code' => 'RO','name' => "Romania",'phonecode' => 40),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 181,'code' => 'RU','name' => "Russia",'phonecode' => 70),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 182,'code' => 'RW','name' => "Rwanda",'phonecode' => 250),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 183,'code' => 'SH','name' => "Saint Helena",'phonecode' => 290),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 184,'code' => 'KN','name' => "Saint Kitts And Nevis",'phonecode' => 1869),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 185,'code' => 'LC','name' => "Saint Lucia",'phonecode' => 1758),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 186,'code' => 'PM','name' => "Saint Pierre and Miquelon",'phonecode' => 508),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 187,'code' => 'VC','name' => "Saint Vincent And The Grenadines",'phonecode' => 1784),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 188,'code' => 'WS','name' => "Samoa",'phonecode' => 684),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 189,'code' => 'SM','name' => "San Marino",'phonecode' => 378),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 190,'code' => 'ST','name' => "Sao Tome and Principe",'phonecode' => 239),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 191,'code' => 'SA','name' => "Saudi Arabia",'phonecode' => 966),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 192,'code' => 'SN','name' => "Senegal",'phonecode' => 221),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 193,'code' => 'RS','name' => "Serbia",'phonecode' => 381),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 194,'code' => 'SC','name' => "Seychelles",'phonecode' => 248),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 195,'code' => 'SL','name' => "Sierra Leone",'phonecode' => 232),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 196,'code' => 'SG','name' => "Singapore",'phonecode' => 65),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 197,'code' => 'SK','name' => "Slovakia",'phonecode' => 421),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 198,'code' => 'SI','name' => "Slovenia",'phonecode' => 386),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 199,'code' => 'XG','name' => "Smaller Territories of the UK",'phonecode' => 44),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 200,'code' => 'SB','name' => "Solomon Islands",'phonecode' => 677),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 201,'code' => 'SO','name' => "Somalia",'phonecode' => 252),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 202,'code' => 'ZA','name' => "South Africa",'phonecode' => 27),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 203,'code' => 'GS','name' => "South Georgia",'phonecode' => 0),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 204,'code' => 'SS','name' => "South Sudan",'phonecode' => 211),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 205,'code' => 'ES','name' => "Spain",'phonecode' => 34),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 206,'code' => 'LK','name' => "Sri Lanka",'phonecode' => 94),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 207,'code' => 'SD','name' => "Sudan",'phonecode' => 249),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 208,'code' => 'SR','name' => "Suriname",'phonecode' => 597),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 209,'code' => 'SJ','name' => "Svalbard And Jan Mayen Islands",'phonecode' => 47),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 210,'code' => 'SZ','name' => "Swaziland",'phonecode' => 268),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 211,'code' => 'SE','name' => "Sweden",'phonecode' => 46),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 212,'code' => 'CH','name' => "Switzerland",'phonecode' => 41),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 213,'code' => 'SY','name' => "Syria",'phonecode' => 963),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 214,'code' => 'TW','name' => "Taiwan",'phonecode' => 886),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 215,'code' => 'TJ','name' => "Tajikistan",'phonecode' => 992),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 216,'code' => 'TZ','name' => "Tanzania",'phonecode' => 255),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 217,'code' => 'TH','name' => "Thailand",'phonecode' => 66),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 218,'code' => 'TG','name' => "Togo",'phonecode' => 228),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 219,'code' => 'TK','name' => "Tokelau",'phonecode' => 690),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 220,'code' => 'TO','name' => "Tonga",'phonecode' => 676),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 221,'code' => 'TT','name' => "Trinidad And Tobago",'phonecode' => 1868),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 222,'code' => 'TN','name' => "Tunisia",'phonecode' => 216),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 223,'code' => 'TR','name' => "Turkey",'phonecode' => 90),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 224,'code' => 'TM','name' => "Turkmenistan",'phonecode' => 7370),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 225,'code' => 'TC','name' => "Turks And Caicos Islands",'phonecode' => 1649),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 226,'code' => 'TV','name' => "Tuvalu",'phonecode' => 688),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 227,'code' => 'UG','name' => "Uganda",'phonecode' => 256),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 228,'code' => 'UA','name' => "Ukraine",'phonecode' => 380),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 229,'code' => 'AE','name' => "United Arab Emirates",'phonecode' => 971),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 230,'code' => 'GB','name' => "United Kingdom",'phonecode' => 44),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 231,'code' => 'US','name' => "United States",'phonecode' => 1),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 232,'code' => 'UM','name' => "United States Minor Outlying Islands",'phonecode' => 1),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 233,'code' => 'UY','name' => "Uruguay",'phonecode' => 598),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 234,'code' => 'UZ','name' => "Uzbekistan",'phonecode' => 998),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 235,'code' => 'VU','name' => "Vanuatu",'phonecode' => 678),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 236,'code' => 'VA','name' => "Vatican City State (Holy See)",'phonecode' => 39),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 237,'code' => 'VE','name' => "Venezuela",'phonecode' => 58),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 238,'code' => 'VN','name' => "Vietnam",'phonecode' => 84),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 239,'code' => 'VG','name' => "Virgin Islands (British)",'phonecode' => 1284),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 240,'code' => 'VI','name' => "Virgin Islands (US)",'phonecode' => 1340),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 241,'code' => 'WF','name' => "Wallis And Futuna Islands",'phonecode' => 681),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 242,'code' => 'EH','name' => "Western Sahara",'phonecode' => 212),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 243,'code' => 'YE','name' => "Yemen",'phonecode' => 967),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 244,'code' => 'YU','name' => "Yugoslavia",'phonecode' => 38),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 245,'code' => 'ZM','name' => "Zambia",'phonecode' => 260),
            array('created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'id' => 246,'code' => 'ZW','name' => "Zimbabwe",'phonecode' => 263),
        );
        DB::table('countries')->insert($countries);
    }
}
