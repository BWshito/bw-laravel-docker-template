<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 該当テーブルのレコードをすべて削除
        DB::table('todos')->truncate();

        // テストデータ
        $testData = [
           [
                'content' => 'PHP Appセクションを終える',
                'created_at' => now(),
                'updated_at' => now(),
           ],
           [
                'content' => 'Laravel Lessonを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // 引数のデータをテーブルに投入するINSERT文を実行
        DB::table('todos')->insert($testData);
    }
}
