<? namespace Bitrix\Main\Security\W\Rules\Results; use Bitrix\Main\Security\W\Rules\Results\RuleResult; class CheckResult extends RuleResult{ protected $_1214280967; protected $_716864309; public function __construct($_1214280967, $_716864309){ $this->_1214280967= $_1214280967; $this->_716864309= $_716864309;} public function isSuccess(){ return $this->_1214280967;}  public function getAction(){ return $this->_716864309;}}?>