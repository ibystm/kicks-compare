<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->truncate();
        DB::table('shoes')->insert([
            [
                'name' => 'Air max 95',
                'manufacturer_id' => 1,
                'created_at' => Carbon::create('2016','1','20'),
                'description' => 'ナイキ エア マックス 95は、1995年に誕生したオリジナルモデルのクラシックなデザインラインを継承した一足。前足部には、このモデルを一躍有名にしたMax Airクッショニングを採用しています。',
                'image_url' => 'airmax95.png',
            ],
            [
                'name' => 'Air max 720',
                'manufacturer_id' => 1,
                'created_at' => Carbon::create('2016','2','20'),
                'description' => 'ナイキ エア マックス 720は、Nike史上最も厚みのある大型Airユニットを搭載。足裏の通気性をさらに強化して、想像以上の快適な履き心地を一日中保ちます。エア マックスに限界はないのでしょうか？そう願いましょう。',
                'image_url' => 'airmax720.jpg',
            ],
            [
                'name' => 'Tubular X',
                'manufacturer_id' => 2,
                'created_at' => Carbon::create('2016','3','20'),
                'description' => 'Tubular X PK チューブラーエックス プライムニット。人気急上昇中の注目モデル、チューブラーXより、プライムニットアッパーで覆われたハイエンドモデル。人気色のトリプルブラック。',
                'image_url' => 'tubularx.jpg',
            ],
            [
                'name' => 'ALPHAEDGE 4D',
                'manufacturer_id' => 2,
                'created_at' => Carbon::create('2016','3','20'),
                'description' => '数年間にわたり蓄積されたアスリートのデータを元に開発された”ADIDAS 4D(アディダス 4D)”。UV硬化ポリウレタン混合樹脂を光と酸素で固め、マイクロメーター単位でミッドソールをデジタル設計。細かいグリッドがバネのような推進力を発揮し、広がるグリッドが着地の衝撃を分散、そして、ピンと張った高さのあるグリッドが、足をシューズの中央に固定し、横方向への動きを正確にサポートするのが特徴。',
                'image_url' => 'alphaedge4d.jpg',
            ],
            [
                'name' => 'GEL-LYTE V',
                'manufacturer_id' => 5,
                'created_at' => Carbon::create('2016','3','20'),
                'description' => '4つのマテリアルをバランスよく配置して、アーバンシックな印象に！ファッションとスポーツのハイセンスなミックススタイルを提案するemmi。ブランド初となるコラボレーションモデルを発表。アシックス タイガーASICS TIGERの代表作であり、レトロなシルエットで人気をあつめるゲルライト5GEL-LYTE V。',
                'image_url' => 'asicstigergellyte.jpg',
            ],
            [
                'name' => 'INSTAPUMP FURY',
                'manufacturer_id' => 4,
                'created_at' => Carbon::create('2016','1','20'),
                'description' => '1994年にリーボックから発売されたハイテクスニーカー"INSTAPUMP FURY(インスタポンプ フューリー)"。内蔵されたブラッダーに空気を送り込みフィット感を高める未来的なシステム"THE PUMP TECHNOLOGY"を敢えて可視化することで独創的なスタイルを構築。90年のハイテクブームを象徴する傑作として爆発的なヒットを遂げた。',
                'image_url' => 'reebokinstapumpfury.jpg',
            ],
            [
                'name' => 'ALTERATION PN-1',
                'manufacturer_id' => 3,
                'created_at' => Carbon::create('2016','1','20'),
                'description' => '2017年よりデザイナー"JANNIK DAVIDSEN(ヤニク・ダヴィッドセン)"の独創的な世界観と"PUMA"のテクノロジーが融合したコラボレーションを展開。既成概念を壊し新たに再編することをテーマに、現代と未来の異なる２つの世界観を表現した一足"ALTERATION(オルタネーション)"が誕生する。',
                'image_url' => 'pumaalteration.jpg',
            ],
            [
                'name' => 'MATTHEW M. WILLIAMS × NIKE FREE TR 3',
                'manufacturer_id' => 1,
                'created_at' => Carbon::create('2016','1','20'),
                'description' => 'ストラップにより着脱可能となっているビムラムソールを外すと内部には、"NIKE FREE(ナイキフリー)"のアウトソールを用いたインナーブーツが現れる。 アスリート達の莫大な人間工学情報を活用したアパレルコレクションをラインナップしているマシューらしい、ソックスをそのままシューズへと一体化させたデザインが時代のパイオニアらしさをうかがわせている。インソールにはコラボレーションであることを証す、"MMW"のイニシャルを刻印。新時代の到来を感じさせる仕上がりとなっている。 ',
                'image_url' => 'Matthew-M.-Williams-Nike-Free-TR-3-SP-.png',
            ],

        ]);

    }
}
