<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* ========= SET FLASH ========= */

function flash_success($msg)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('type', 'success');
    $CI->session->set_flashdata('msg', $msg);
}

function flash_error($msg)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('type', 'danger');
    $CI->session->set_flashdata('msg', $msg);
}

function flash_warning($msg)
{
    $CI =& get_instance();
    $CI->session->set_flashdata('type', 'warning');
    $CI->session->set_flashdata('msg', $msg);
}

/* ========= RENDER FLASH ========= */

function flash_alert()
{
    $CI =& get_instance();

    $type = $CI->session->flashdata('type');
    $msg  = $CI->session->flashdata('msg');

    if (!$msg) return '';

    return '
    <div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
}
