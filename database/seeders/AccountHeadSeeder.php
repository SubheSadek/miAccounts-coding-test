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

        for ($i = 0; $i < 3; $i++) {

            $parentHead = $this->createHead(null, 'GROUP');

            $noOfChild = $this->numberOfChild();

            for ($j = 0; $j < $noOfChild; $j++) {
                $noOfSubChild = $this->numberOfChild();

                $type = $this->getAccountType($noOfSubChild);
                $childHead = $this->createHead($parentHead->id, $type);

                if ($type === 'HEAD') {
                    $this->createTransaction($childHead->id);
                }

                for ($k = 0; $k < $noOfSubChild; $k++) {
                    $subChild = $this->createHead($childHead->id, 'HEAD');
                    $this->createTransaction($subChild->id);
                }
            }
        }
    }

    function getAccountType(int $noOfSubChild): string
    {
        if ($noOfSubChild) {
            return 'GROUP';
        }
        return 'HEAD';
    }
    function numberOfChild(): int
    {
        return fake()->numberBetween(0, 3);
    }

    function createHead(int $headId = null, $type): AccountHead
    {
        $keyValues = [
            'account_head_id' => $headId,
            'type' => $type,
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
