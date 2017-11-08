{extends file="layout.tpl"}
{block name=body}
  <h2>{$error}<h2>
  <h1>Wellcome, {$smarty.session.name|default: null}</h1>
  <a href="unlog.php">unlog</a>
{/block}
