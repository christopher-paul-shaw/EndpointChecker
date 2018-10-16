<?php
namespace App\Test;
use CPS\EndpointChecker;
use PHPUnit\Framework\TestCase;

class EndpointCheckerTest extends TestCase {

	public function setUp () {}

    	public function testICanUseClass () {
		$payload[] = ['url' => 'https://www.google.com'];
		$runner =  new EndpointChecker();
		$result = $runner->process($payload);
		$this->assertTrue(isset($result[0]['status']));
	}
	
	/**
	* @expectedException        Exception
	* @expectedExceptionMessage Input needs to be an array
	*/
	public function testICanOnlyPassArray () {
		$runner =  new EndpointChecker();
		$result = $runner->process("some url");
	}	

	public function testIsGoogleAlive () {
		$runner =  new EndpointChecker();
		$result = $runner->getStatus("https://www.google.com");
		$this->assertEquals($result, 200);		
	}

	public function testICanGetStatusOnRealUrl () {
		$payload[] = ['url' => 'https://www.google.com'];
		$runner =  new EndpointChecker();
		$result = $runner->process($payload);
		$this->assertEquals(200,$result[0]['status']);
	}

	public function testIGetDontGet200ForMissingUrl () {

		$payload[] = ['url' => 'www.somerandomfake404site.end'];
		$runner =  new EndpointChecker();
		$result = $runner->process($payload);
		$this->assertNotEquals(200,$result[0]['status']);
	}
}
