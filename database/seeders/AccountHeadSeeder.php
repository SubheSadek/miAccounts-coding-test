<?php

namespace Database\Seeders;

use App\Models\AccountHead;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AccountHead::truncate();
        Transaction::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 0; $i < 10; $i++) {

            $parentHead = $this->createHead();
            $this->createTransaction($parentHead->id);

            $noOfChild = $this->numberOfChild();

            for ($j = 0; $j < $noOfChild; $j++) {

                $childHead = $this->createHead($parentHead->id);
                $this->createTransaction($childHead->id);

                $noOfSubChild = $this->numberOfChild();

                for ($k = 0; $k < $noOfSubChild; $k++) {
                    $subChild = $this->createHead($childHead->id);
                    $this->createTransaction($subChild->id);
                }
            }
        }
    }

    function numberOfChild(): int
    {
        return fake()->numberBetween(0, 3);
    }

    function createHead(int $headId = null): AccountHead
    {
        $keyValues = [
            'account_head_id' => $headId,
        ];
        return AccountHead::factory()->create($keyValues);
    }

    function createTransaction(int $headId): void
    {
        $keyValues = [
            'account_head_id' => $headId,
        ];
        Transaction::factory()->create($keyValues);
    }
}
