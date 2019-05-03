<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('Blog');
        $this->call('TableInfo');
        //this message shown in your terminal after running db:seed command
        $this->command->info("blog table seeded :)");
        $this->command->info("tableinfo table seeded :)");
    }
}
class Blog extends Seeder {
   public function run()
   {
     //insert some dummy records
     DB::table('blog')->insert(array(
         array('title'=>'Title 1','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'1.jpg','created_at'=>'2019-05-08 12:06:00'),
         array('title'=>'Title 2','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'2.jpg','created_at'=>'2019-05-08 12:06:00'),
         array('title'=>'Title 3','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'3.jpg','created_at'=>'2019-05-08 12:06:00'),
         array('title'=>'Title 4','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'4.jpg','created_at'=>'2019-05-08 12:06:00'),
         array('title'=>'Title 5','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'5.jpg','created_at'=>'2019-05-08 12:06:00'),
         array('title'=>'Title 6','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','image'=>'6.jpg','created_at'=>'2019-05-08 12:06:00')
    ));
   }
}
class TableInfo extends Seeder {
   public function run()
   {
     //insert some dummy records
     DB::table('tableinfo')->insert(array(
		array('first_name'=>'Frank','last_name'=>'Taylor','age'=>'23','city'=>'Wellington','country'=>'New Zealand'),
     	array('first_name'=>'Isaac','last_name'=>'Anderson','age'=>'34','city'=>'Niamey','country'=>'Niger'),
     	array('first_name'=>'Dan','last_name'=>'Bower','age'=>'44','city'=>'Ottawa','country'=>'Canada'),
     	array('first_name'=>'Ava','last_name'=>'Burgess','age'=>'55','city'=>'Moroni','country'=>'Comoros'),
     	array('first_name'=>'Dan','last_name'=>'Thomson','age'=>'11','city'=>'Doha','country'=>'Qatar'),
     	array('first_name'=>'Paul','last_name'=>'Ferguson','age'=>'23','city'=>'Bucharest','country'=>'Romania'),
     	array('first_name'=>'Trevor','last_name'=>'Lambert','age'=>'23','city'=>'Senegal','country'=>'Dakar'),
     	array('first_name'=>'Simon','last_name'=>'Thomson','age'=>'33','city'=>'Slovenia','country'=>'Ljubljana'),
     	array('first_name'=>'Dan','last_name'=>'Peake','age'=>'77','city'=>'Tokyo','country'=>'Japan'),
     	array('first_name'=>'Sean','last_name'=>'Sanderson','age'=>'26','city'=>'Vientiane','country'=>'Laos'),
     	array('first_name'=>'Oliver','last_name'=>'MacDonald','age'=>'56','city'=>'Bucharest','country'=>'Romania'),
     	array('first_name'=>'Jake','last_name'=>'Peake','age'=>'13','city'=>'Havana','country'=>'Cuba'),
     	array('first_name'=>'Paul','last_name'=>'Wilkins','age'=>'03','city'=>'Havana','country'=>'Cuba'),
     	array('first_name'=>'James','last_name'=>'Thomson','age'=>'14','city'=>'Ghana','country'=>'Accra'),
     	array('first_name'=>'Joe','last_name'=>'Taylor','age'=>'58','city'=>'Bucharest','country'=>'Romania'),
     	array('first_name'=>'John','last_name'=>'Skinner','age'=>'52','city'=>'Wellington','country'=>'New Zealand'),
     	array('first_name'=>'Jason','last_name'=>'Payne','age'=>'63','city'=>'Wellington','country'=>'New Zealand'),
     	array('first_name'=>'Jack','last_name'=>'Peake','age'=>'74','city'=>'Tokyo','country'=>'Japan'),
     	array('first_name'=>'Eric','last_name'=>'Poole','age'=>'55','city'=>'Ottawa','country'=>'Canada'),
     	array('first_name'=>'Evan','last_name'=>'Ellison','age'=>'20','city'=>'Ottawa','country'=>'Canada'),
     	array('first_name'=>'Connor','last_name'=>'Ferguson','age'=>'10','city'=>'Bucharest','country'=>'Romania'),
     	array('first_name'=>'Angela','last_name'=>'Kelly','age'=>'52','city'=>'Slovenia','country'=>'Ljubljana'),
     	array('first_name'=>'Deirdre','last_name'=>'Marshall','age'=>'75','city'=>'Ghana','country'=>'Accra'),
     	array('first_name'=>'Donna','last_name'=>'Campbell','age'=>'10','city'=>'Havana','country'=>'Cuba'),
     	array('first_name'=>'Connor','last_name'=>'Mathis','age'=>'05','city'=>'Wellington','country'=>'New Zealand')

     ));
   }
}