<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        //
        Organization::create([
            'organization_name' => 'Yayasan Bumi Hijau',
            'operational_address' => 'Jalan Hutan 123',
            'brief_description' => 'Organisasi nirlaba yang berfokus pada reboisasi',
            'coverage_region' => 'Asia Pasifik',
            'official_contact_info' => 'kontakgef@gmail.com',
            'organization_logo' => 'logos/AkademiCypto.png',
            'existing_partner_or_sponsor' => 'Baru',
            'organization_status' => 'Active'
        ]);

        Organization::create([
            'organization_name' => 'Kepercayaan Samudra Biru',
            'operational_address' => 'Jalan Pantai 456',
            'brief_description' => 'Organisasi nirlaba yang berdedikasi pada konservasi laut',
            'coverage_region' => 'Global',
            'official_contact_info' => 'info@blueocean.org',
            'organization_logo' => 'logos/MarineBlue.png',
            'existing_partner_or_sponsor' => 'Eksisting',
            'organization_status' => 'Active'
        ]);

        Organization::create([
            'organization_name' => 'Kolektif Pembaruan Perkotaan',
            'operational_address' => 'Plaza Kota 789',
            'brief_description' => 'Proyek keberlanjutan perkotaan yang didorong oleh komunitas',
            'coverage_region' => 'Amerika Utara',
            'official_contact_info' => 'urbanrenewal@outlook.com',
            'organization_logo' => 'logos/GreenPeace.png',
            'existing_partner_or_sponsor' => 'Baru',
            'organization_status' => 'Active'
        ]);

        Organization::create([
            'organization_name' => 'Inisiatif Mekar Gurun',
            'operational_address' => 'Jalan Kering 101',
            'brief_description' => 'Mempromosikan pertanian di wilayah kering',
            'coverage_region' => 'Timur Tengah',
            'official_contact_info' => 'desertbloom@yahoo.com',
            'organization_logo' => 'logos/DesertInitiative.png',
            'existing_partner_or_sponsor' => 'Eksisting',
            'organization_status' => 'Not Active'
        ]);

        Organization::create([
            'organization_name' => 'Penjaga Gunung',
            'operational_address' => 'Jalan Dataran Tinggi 321',
            'brief_description' => 'Konservasi ekosistem pegunungan',
            'coverage_region' => 'Amerika Selatan',
            'official_contact_info' => 'mountainguard@gmail.com',
            'organization_logo' => 'logos/MountainGuardian.png',
            'existing_partner_or_sponsor' => 'Baru',
            'organization_status' => 'Not Active'
        ]);

        Organization::create([
            'organization_name' => 'Jaringan Sungai Bersih',
            'operational_address' => 'Jalan Tepi Sungai 654',
            'brief_description' => 'Memulihkan sungai dan saluran air yang tercemar',
            'coverage_region' => 'Eropa',
            'official_contact_info' => 'cleanrivers@protonmail.com',
            'organization_logo' => 'logos/RiverNetwork.png',
            'existing_partner_or_sponsor' => 'Eksisting',
            'organization_status' => 'Not Active'
        ]);
    }
}
