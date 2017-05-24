<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2017/3/8
 * Time: 16:42
 */
return [
'template'               => [
    // ģ���������� ֧�� php think ֧����չ
    'type'         => 'Think',
    // ģ��·��
    'view_path'    => './public/static/admin/',
    // ģ���׺
    'view_suffix'  => 'html',
    // ģ���ļ����ָ���
    'view_depr'    => DS,
    // ģ��������ͨ��ǩ��ʼ���
    'tpl_begin'    => '{',
    // ģ��������ͨ��ǩ�������
    'tpl_end'      => '}',
    // ��ǩ���ǩ��ʼ���
    'taglib_begin' => '{',
    // ��ǩ���ǩ�������
    'taglib_end'   => '}',
    // 默认控制器名

],
    'default_controller'     => 'Schedule',
    // 默认操作名
    'default_action'         => 'index',
];