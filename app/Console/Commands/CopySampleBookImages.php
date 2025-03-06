<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CopySampleBookImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:copy-sample-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy sample book images to the storage directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Copying sample book images...');

        // Create books directory if it doesn't exist
        Storage::disk('public')->makeDirectory('books');

        // Sample image URLs
        $imageUrls = [
            'gatsby.jpg' => 'https://m.media-amazon.com/images/I/71FTb9X6wsL._AC_UF1000,1000_QL80_.jpg',
            'mockingbird.jpg' => 'https://m.media-amazon.com/images/I/81aY1lxk+9L._SL1500_.jpg',
            '1984.jpg' => 'https://m.media-amazon.com/images/I/71kxa1-0mfL._AC_UF1000,1000_QL80_.jpg',
            'pride.jpg' => 'https://m.media-amazon.com/images/I/71Q1tPupKjL._AC_UF1000,1000_QL80_.jpg',
            'hobbit.jpg' => 'https://m.media-amazon.com/images/I/710+HcoP38L._AC_UF1000,1000_QL80_.jpg',
        ];

        foreach ($imageUrls as $filename => $url) {
            $this->info("Downloading: {$filename}");
            
            try {
                $imageContent = file_get_contents($url);
                
                if ($imageContent === false) {
                    $this->error("Failed to download: {$filename}");
                    continue;
                }
                
                $path = 'books/' . $filename;
                Storage::disk('public')->put($path, $imageContent);
                
                $this->info("Saved: {$path}");
            } catch (\Exception $e) {
                $this->error("Error processing {$filename}: " . $e->getMessage());
            }
        }

        $this->info('Sample book images have been copied to the storage directory.');
    }
} 