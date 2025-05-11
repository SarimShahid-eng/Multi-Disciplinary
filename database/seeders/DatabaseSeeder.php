<?php

namespace Database\Seeders;

use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin;
use App\Models\Author;
use App\Models\Journal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $authorRole = Role::create(['name' => 'author']);
        // $reviewerRole = Role::create(['name' => 'reviewer']);
        // $editorRole = Role::create(['name' => 'editor-in-chief']);
        // $assistantEditorRole = Role::create(['name' => 'assistant-editor']);
        // $associateEditorRole = Role::create(['name' => 'associate-editor']);
        // $authorUser = User::factory()->create([
        //     'firstname' => 'Author',
        //     'email' => 'author@example.com',
        // ]);

        // $authorUser->roles()->attach($authorRole);
        // $reviewerUser = User::factory()->create([
        //     'firstname' => 'Reviewer',
        //     'email' => 'reviewer@example.com',
        // ]);
        // $reviewerUser->roles()->attach($reviewerRole);
        // $editorUser = User::factory()->create([
        //     'firstname' => 'Editor',
        //     'email' => 'editor@example.com',
        // ]);
        // $editorUser->roles()->attach($editorRole);
        // $assistantEditor = User::factory()->create([
        //     'firstname' => 'Assistant Editor',
        //     'email' => 'assistanteditor@example.com',
        // ]);
        // $assistantEditor->roles()->attach($assistantEditorRole);
        // $associateEditor = User::factory()->create([
        //     'firstname' => 'Associate Editor',
        //     'email' => 'associateditor@example.com',
        // ]);
        // $associateEditor->roles()->attach($associateEditorRole);
        // Admin::factory(1)->create();
        // Journal::factory(1)->create([
        //     'name'=>'Impact in Nano Science',
        //     'email'=>'Younus343@gmail.com',
        //     'issn'=>'1940-0871',
        //     'editor_in_chief_id'=>5,
        //     'description'=>'Journal of nano Science',

        // ]);
        // Journal::factory(1)->create();

    }
}
