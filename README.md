# Summary
This class accepts a payload with URLS and returns the array with the current status of the url

# Usage



    $runner = new CPS\EndpointChecker();
    $payload = [
        ['url' => 'https://www.chris-shaw.com', 'title' => 'Authors Homepage'],
        ['url' => 'https://www.example.com', 'title' => 'Example Website'],
    ];


    $result = $runner->process($payload);

# Test
As features are added, there will be new tests to prove they work as intended. 
You can run the tests yourself using the following command.

    vendor/bin/phpunit test
