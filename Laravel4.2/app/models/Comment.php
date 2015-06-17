<?php
class Comment extends \Eloquent {
	protected $fillable = [ ];
	public function commentable() {
		return $this->morphTo ();
	}
}