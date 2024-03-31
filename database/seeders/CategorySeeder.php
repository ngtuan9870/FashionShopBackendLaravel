<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Đầm',
                'image' => 'http://localhost:8000/storage/categoryimages/category.jpg',
                'description' => 'Đầm là trang phục liền mảnh vừa che phần trên cơ thể và phần dưới thắt lưng. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Váy',
                'image' => 'http://localhost:8000/storage/categoryimages/vay.jpg',
                'description' => 'Váy là đồ mặc che thân từ thắt lưng trở xuống, trước đây đa số phụ nữ đều mặc. Một số nước nam giới cũng mặc váy.  ',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Áo len',
                'image' => 'http://localhost:8000/storage/categoryimages/aolen.webp',
                'description' => 'Áo len hoặc áo chui đầu, còn được gọi là jersey hoặc jumper, là một loại quần áo, thường có tay áo dài, được làm bằng chất liệu dệt kim hoặc móc che phần trên của cơ thể.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Áo khoác',
                'image' => 'http://localhost:8000/storage/categoryimages/aokhoac.jpg',
                'description' => 'Áo khoác là loại áo mặc bên ngoài, được sử dụng bởi cả nam và nữ, nhằm mục đích giữ ấm hoặc tạo tính thời trang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Áo sơ mi',
                'image' => 'http://localhost:8000/storage/categoryimages/aosomi.jpg',
                'description' => 'Áo sơ-mi là loại hàng may mặc bao bọc lấy thân mình và hai cánh tay của cơ thể. Ở thế kỷ 19, sơ mi là một loại áo lót bằng vải dệt mặc sát da thịt. Ngày nay, sơ mi có cổ áo, tay áo và hàng nút phía trước.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Com lê',
                'image' => 'http://localhost:8000/storage/categoryimages/comle.webp',
                'description' => 'Com lê hay còn gọi là bộ Âu phục hay bộ suit, là một bộ trang phục cho nam giới bao gồm nguyên bộ áo và quần may cùng một loại vải.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Áo thun',
                'image' => 'http://localhost:8000/storage/categoryimages/aothun.webp',
                'description' => 'Áo thun, hay áo phông thường được dệt theo nốt jersey và bằng sợi cotton, đôi khi bằng chất liệu khác, tạo sự mềm mại đặc trưng. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Hoodie',
                'image' => 'http://localhost:8000/storage/categoryimages/hoodie.webp',
                'description' => 'Áo hoodie là một loại áo nỉ có mũ trùm đầu che một phần hoặc toàn bộ đầu hoặc mặt của người mặc.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Jumpsuit',
                'image' => 'http://localhost:8000/storage/categoryimages/jumpsuit.jpg',
                'description' => 'Bộ áo liền quần là loại quần áo liền mảnh có tay áo và chân và thường không có phần che phủ kín cho bàn chân, bàn tay hoặc đầu. Bộ đồ nhảy ban đầu là loại quần áo liền mảnh chức năng được những người nhảy dù sử dụng.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Quần jean',
                'image' => 'http://localhost:8000/storage/categoryimages/quanjean.webp',
                'description' => 'Jeans là một loại quần xuất xứ từ các nước phương Tây. Quần jeans là một loại quần, thường được làm từ vải denim hoặc dungaree.',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Quần short',
                'image' => 'http://localhost:8000/storage/categoryimages/quanshort.jpg',
                'description' => 'Quần đùi là một loại quần áo mặc qua vùng xương chậu, vòng qua eo và xẻ tà để che phần trên của đôi chân, đôi khi kéo dài đến đầu gối nhưng không che hết chiều dài của chân. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Quần tây',
                'image' => 'http://localhost:8000/storage/categoryimages/quantay.jpg',
                'description' => 'Quần tây là một loại trang phục quen thuộc hiện nay. Tính tới thời điểm hiện tại đây là loại trang phục duy nhất còn tồn tại và thịnh hành cho đến ngày nay.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
