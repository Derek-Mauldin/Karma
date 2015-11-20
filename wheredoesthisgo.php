<?php
$str = "Jennifer";
echo md5($str);
?>



protected $salt=null;
protected $hash=null;

$this->salt = bin2hex(openssl_pseudo_random_bytes(32));
$this->hash = hash_pbkdf2("sha512", "testpassword", $this->salt, 4096, 128);
/**
* test grabbing a karma by karma action date
*/
public function testGetValidKarmaByKarmaActionDate() {
// count the number of rows and save it for later
$numRows = $this->getConnection()->getRowCount("karma");
// create a new Karma and insert to into mySQL
$karma = new Karma(null, $this->profile->getProfileId(), $this->need->getNeedId(), $this->VALID_KARMAACCEPTED, $this->VALID_KARMAACTIONDATE);
$karma->insert($this->getPDO());

/**
* grab the data from mySQL and enforce the fields match our expectations
*/

$pdoKarma = Karma::getKarmaByKarmaAccepted($this->getPDO(), $karma->getKarmaAccepted());
$this->assertSame($numRows + 1, $this->getConnection()->getRowCount("karma"));
$this->assertSame($pdoKarma[0]->getProfileId(), $this->profile -> getProfileId());
$this->assertSame($pdoKarma[0]->getNeedIdl(), $this->need->getNeedId());
$this->assertSame($pdoKarma[0]->getKarmaAccepted(), $this->VALID_KARMAACCEPTED);
$this->assertSame($pdoKarma[0]->getKarmaActionDate(), $this->VALID_KARMAACTIONDATE);