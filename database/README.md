# DataBase (factory & migration & seed)
## 1 - Migration
```
$table->string('email', 30)->unique();
```
## 2- Migration
```
Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('title', 30);
            $table->foreign('section_id')->on('sections')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps(); 
            $table->timestamp('created_at')->nullable();
        });
```
## 3 - FACTORY
```
str_random(10);
bcrypt('secret') OR \Hash::make('123456')
```
## 4 - SEEDER
### DatabaseSeeder.php
```
// note you must put all of the next lines in the same order because there are some tables depends on others

$this->call(RoleTableSeeder::class);
$this->call(CompanyTableSeeder::class);
$this->call(UserTableSeeder::class);
```

### UserTableSeeder.php
```
// in the run function you can implement ORM (Elquent) or Fluent query-builder
$company = new company();
        $company->name = 'Company';
        $company->email = 'Company@company.com';
        $company->website = 'http://www.company.com';
        $company->logo_path = 'storage/logos/noImage.jpg';
        $company->save();
```
