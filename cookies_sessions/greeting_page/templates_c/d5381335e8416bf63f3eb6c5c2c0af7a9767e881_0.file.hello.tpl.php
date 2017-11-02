<?php
/* Smarty version 3.1.30, created on 2017-11-02 19:50:25
  from "C:\xampp\htdocs\PHP\Homework_PHP\PHP\cookies_sessions\greeting_page\template\hello.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59fb68f15ccd21_60441937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5381335e8416bf63f3eb6c5c2c0af7a9767e881' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PHP\\Homework_PHP\\PHP\\cookies_sessions\\greeting_page\\template\\hello.tpl',
      1 => 1509648623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_59fb68f15ccd21_60441937 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1264259fb68f15cbb90_35922165', 'body');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_1264259fb68f15cbb90_35922165 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <h1>Wellcome, <?php echo $_SESSION['user']['name'];?>
</h1>

<?php
}
}
/* {/block 'body'} */
}
