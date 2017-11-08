{extends file="layout.tpl"}
{block name="body"}
  <form action="hello.php" method="post">
    <input type="text" name="username">
    <input type="submit" value="send">
  </form>
{/block}
