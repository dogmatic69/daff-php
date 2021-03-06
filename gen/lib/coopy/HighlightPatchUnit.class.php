<?php

class coopy_HighlightPatchUnit {
	public function __construct() {
		if(!php_Boot::$skip_constructor) {
		$this->add = false;
		$this->rem = false;
		$this->update = false;
		$this->sourceRow = -1;
		$this->sourceRowOffset = 0;
		$this->sourcePrevRow = -1;
		$this->sourceNextRow = -1;
		$this->destRow = -1;
		$this->patchRow = -1;
		$this->code = "";
	}}
	public $add;
	public $rem;
	public $update;
	public $code;
	public $sourceRow;
	public $sourceRowOffset;
	public $sourcePrevRow;
	public $sourceNextRow;
	public $destRow;
	public $patchRow;
	public function toString() {
		return _hx_string_or_null($this->code) . " patchRow " . _hx_string_rec($this->patchRow, "") . " sourceRows " . _hx_string_rec($this->sourcePrevRow, "") . "," . _hx_string_rec($this->sourceRow, "") . "," . _hx_string_rec($this->sourceNextRow, "") . " destRow " . _hx_string_rec($this->destRow, "");
	}
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->__dynamics[$m]) && is_callable($this->__dynamics[$m]))
			return call_user_func_array($this->__dynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call <'.$m.'>');
	}
	function __toString() { return $this->toString(); }
}
