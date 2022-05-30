<?php
/*
 * @Date         : 2022-03-02 14:49:25
 * @LastEditors  : Jack Zhou <jack@ks-it.co>
 * @LastEditTime : 2022-03-02 17:22:16
 * @Description  :
 * @FilePath     : /recruitment-php-code-test/tests/App/DemoTest.php
 */

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase {

//    public function test_foo() {
//
//    }

    public function test_get_user_info() {
        $logger = new AppLogger('think-log');
        $request = new HttpRequest();
        $demo = new Demo($logger, $request);
        $json_data = $demo->get_user_info();
        $this->assertJson($json_data);
//        $result = array(
//            'error' => 0,
//            'data' => array(
//                'id' => 1,
//                "username" => "hello world"
//            ),
//        );
//        $this->expectOutputString(json_encode($result));
//        print $json_data;
    }
}
