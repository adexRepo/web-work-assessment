<?php

namespace web\work\assessment\App;

use PHPUnit\Framework\TestCase;


class ViewTest extends TestCase
{
    public function testRender(){
        View::render('Home/index',[],false);

        $this->expectOutputRegex('[Sign in]' );
        $this->expectOutputRegex('[html]'    );
        $this->expectOutputRegex('[body]'    );
        $this->expectOutputRegex('[Username]');
        $this->expectOutputRegex('[Password]');
        $this->expectOutputRegex('[Register]');
        $this->expectOutputRegex('[Sign In]' );
    }

}