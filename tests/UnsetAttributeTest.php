<?php

class UnsetAttributeTest extends TestCase
{
    public function testUnsetAttribute()
    {
        $user = new User(['name' => 'John Doe', 'first_name' => 'John', 'last_name' => 'Doe']);

        $user->save();

        $user->unsetAttribute('name');
        $user->renameAttribute('last_name', 'surname');
        $user->birthday = new DateTime('19 august 1989');

        $user->save();

        $this->assertEquals($user->toArray(), $user->fresh()->toArray());

    }
}
