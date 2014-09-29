<?php

function assets_url($filename = false) {
	if ($filename == false) {
		return site_url() . 'assets/';
	} else {
		return site_url() . 'assets/' . $filename;
	}
}

function storage_url($filename = false) {
	if ($filename == false) {
		return site_url() . 'storage/';
	} else {
		return site_url() . 'storage/' . $filename;
	}
}