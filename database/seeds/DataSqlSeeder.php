<?php

use Illuminate\Database\Seeder;

class DataSqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dataInsertIntoUsers = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar_id`, `optician_id`, `type`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
                                    (2, 'Rashinda Sandaru', 'rashinda@test.com', '".bcrypt('admin123')."', '1', NULL, 'admin', 1, 't20DU5COsUtaxFwMIKWWJZJebna4PAu0TW2vPHRcl9ZjsiSyWddZO9EzcsXI', '2019-06-08 12:24:17', '2019-06-08 12:24:17'),
                                    (3, 'Achala Kavinda', 'achala@gmail.com', '".bcrypt('admin123')."', '2', NULL, 'admin', 1, 'Ua2Vmdvhiqop2A2Dw1eEmzSaVoKuxb8BiMtnZmI2BPsQit7aM1kqqOfz4zyk', '2019-06-08 12:25:05', '2019-06-08 12:25:05'),
                                    (4, 'Ramani Cabraal', 'ramani@gmail.com', '".bcrypt('admin123')."', '3', NULL, 'optician', 1, NULL, '2019-06-08 12:27:39', '2019-06-08 12:27:39'),
                                    (5, 'Sulari Cabraal', 'sulari@gmail.com', '".bcrypt('admin123')."', '4', NULL, 'optician', 1, NULL, '2019-06-08 12:30:57', '2019-06-08 12:30:57'),
                                    (6, 'Bhanuka', 'bhanuka@gmail.com', '".bcrypt('admin123')."', '5', 4, 'patient', 1, NULL, '2019-06-08 12:32:15', '2019-06-08 12:32:15'),
                                    (7, 'Pradeep', 'pradeep@gmail.com', '".bcrypt('admin123')."', '6', 4, 'patient', 1, NULL, '2019-06-08 12:33:38', '2019-06-08 12:33:38'),
                                    (8, 'Akhila', 'akhila@gmail.com', '".bcrypt('admin123')."', '7', 5, 'patient', 1, NULL, '2019-06-08 12:34:38', '2019-06-08 12:34:38'),
                                    (9, 'pasan', 'pasan@gmail.com', '".bcrypt('admin123')."', '8', 5, 'patient', 1, NULL, '2019-06-08 12:35:22', '2019-06-08 12:35:22'),
                                    (10, 'Telma Cabraal', 'telma@gmail.com', '".bcrypt('admin123')."', '9', NULL, 'optician', 1, NULL, '2019-06-08 12:37:35', '2019-06-08 12:37:35'),
                                    (11, 'dilanka', 'dilanka@gmail.com', '".bcrypt('admin123')."', '10', 10, 'patient', 1, NULL, '2019-06-08 12:38:41', '2019-06-08 12:38:41'),
                                    (12, 'Minuka', 'minuka@gmail.com', '".bcrypt('admin123')."', '11', 10, 'patient', 1, NULL, '2019-06-08 12:39:33', '2019-06-08 12:39:33'),
                                    (13, 'Pathirana', 'pathirana@gmail.com', '".bcrypt('admin123')."', '12', NULL, 'optician', 1, NULL, '2019-06-08 12:41:22', '2019-06-08 12:41:22'),
                                    (14, 'bot1', 'bot@gmail.com', '".bcrypt('admin123')."', '13', NULL, 'optician', 1, NULL, '2019-06-08 12:43:06', '2019-06-08 12:43:06'),
                                    (15, 'sithira', 'sithira@gmail.com', '".bcrypt('admin123')."', '14', 13, 'patient', 1, NULL, '2019-06-08 12:44:15', '2019-06-08 12:44:15'),
                                    (16, 'hasith', 'hasith@gmail.com', '".bcrypt('admin123')."', '15', 13, 'patient', 1, NULL, '2019-06-08 12:46:13', '2019-06-08 12:46:13'),
                                    (17, 'kasun', 'kasun@gmail.com', '".bcrypt('admin123')."', NULL, 14, 'patient', 1, NULL, '2019-06-08 12:48:21', '2019-06-08 12:48:21'),
                                    (18, 'eranga', 'eranga@gmail.com', '".bcrypt('admin123')."', NULL, 14, 'patient', 1, NULL, '2019-06-08 12:49:06', '2019-06-08 12:49:06');";

        DB::select($dataInsertIntoUsers);

        $dataInsertIntoOpticianDetails = "INSERT INTO `optician_details` (`id`, `user_id`, `shop_name`, `br_number`, `address`, `contact_number`, `contact_number_alternative`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
                (1, 4, 'Cabraal Opticians', '455190', 'main street,battaramulla', '0767144752', '0112871676', '6.902190899999999', '79.91631570000004', '2019-06-08 12:27:39', '2019-06-08 12:27:39'),
                (2, 5, 'Cabraal Opticians - Wattala', '455190', 'main street, wattala', '0777696869', '11384383', '6.990667699999999', '79.89317089999997', '2019-06-08 12:30:57', '2019-06-08 12:31:15'),
                (3, 10, 'Cabraal Opticians - Nayakakanda', 'BR5969', 'nayakakanda', '0777144752', '283292', '6.9916357', '79.88288280000006', '2019-06-08 12:37:35', '2019-06-08 12:37:35'),
                (4, 13, 'Neth Roo', 'BR607070', 'bellanvila', '07760139132', '283292', '6.845646599999999', '79.89004109999996', '2019-06-08 12:41:22', '2019-06-08 12:41:22'),
                (5, 14, 'bot office', 'bot12345', 'ja-ela', '0776013914', '678999', '7.0745127', '79.91367309999998', '2019-06-08 12:43:06', '2019-06-08 12:43:06');";

        DB::select($dataInsertIntoOpticianDetails);

        $dataInsertIntoPatientDetails="INSERT INTO `patient_details` (`id`, `user_id`, `optician_detail_id`, `address`, `contact_number`, `birthday`, `created_at`, `updated_at`) VALUES
                (1, 6, 4, '10/5a, 1st lane, Sri subuthipura, battaramulla', '0767144752', '1996-11-02', '2019-06-08 12:32:15', '2019-06-08 12:32:15'),
                (2, 7, 4, 'main street, wattala', '0776013914', '2019-06-02', '2019-06-08 12:33:38', '2019-06-08 12:33:38'),
                (3, 8, 5, 'nayakakanda', '077555362', '1997-11-21', '2019-06-08 12:34:38', '2019-06-08 12:34:38'),
                (4, 9, 5, 'bellanvila', '7768879', '1998-11-22', '2019-06-08 12:35:22', '2019-06-08 12:35:22'),
                (5, 11, 10, 'wattala', '077692123', '1998-04-18', '2019-06-08 12:38:41', '2019-06-08 12:38:41'),
                (6, 12, 10, 'nayakakanda', '0771743434', '1994-09-13', '2019-06-08 12:39:33', '2019-06-08 12:39:33'),
                (7, 15, 13, '1st lane,bellanvilla', '066689', '1995-12-05', '2019-06-08 12:44:15', '2019-06-08 12:44:15'),
                (8, 16, 13, '2nd lane, bellanvila', '0776013323', '1995-11-22', '2019-06-08 12:46:13', '2019-06-08 12:46:13'),
                (9, 17, 14, 'bot address', '777777777', '1995-11-23', '2019-06-08 12:48:21', '2019-06-08 12:48:21'),
                (10, 18, 14, 'bot address', '888888888', '1995-11-23', '2019-06-08 12:49:06', '2019-06-08 12:49:06');";

        DB::select($dataInsertIntoPatientDetails);

        $dataInsertIntoAvatas = "INSERT INTO `avatars` (`id`, `file`, `created_at`, `updated_at`) VALUES
                                (1, '1559982257Presbyopia_EN.jpg', '2019-06-08 12:24:17', '2019-06-08 12:24:17'),
                                (2, '1559982305presbyope.jpg', '2019-06-08 12:25:05', '2019-06-08 12:25:05'),
                                (3, '1559982459myopiafour.jpg', '2019-06-08 12:27:39', '2019-06-08 12:27:39'),
                                (4, '1559982657myopiatwo.jpg', '2019-06-08 12:30:57', '2019-06-08 12:30:57'),
                                (5, '1559982735download.jfif', '2019-06-08 12:32:15', '2019-06-08 12:32:15'),
                                (6, '1559982818hyperopiatwo.jpg', '2019-06-08 12:33:38', '2019-06-08 12:33:38'),
                                (7, '1559982878hyperopiathree.jpg', '2019-06-08 12:34:38', '2019-06-08 12:34:38'),
                                (8, '1559982922hyperopiaone.jpg', '2019-06-08 12:35:22', '2019-06-08 12:35:22'),
                                (9, '1559983055AstigmaticEye.jpg', '2019-06-08 12:37:35', '2019-06-08 12:37:35'),
                                (10, '155998312132407142_1354852967984256_4427050210505523200_n.jpg', '2019-06-08 12:38:41', '2019-06-08 12:38:41'),
                                (11, '155998317310391030_528180063954397_7331387870393717949_n.jpg', '2019-06-08 12:39:33', '2019-06-08 12:39:33'),
                                (12, '1559983282bf93c535845b3524b64693c9cf74bac0.jpg', '2019-06-08 12:41:22', '2019-06-08 12:41:22'),
                                (13, '1559983386eye.jpg', '2019-06-08 12:43:06', '2019-06-08 12:43:06'),
                                (14, '1559983455spec.jfif', '2019-06-08 12:44:15', '2019-06-08 12:44:15'),
                                (15, '1559983573blurred.png', '2019-06-08 12:46:13', '2019-06-08 12:46:13');";

        DB::select($dataInsertIntoAvatas);
    }
}
