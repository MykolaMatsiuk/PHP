{extends file="layout.tpl"}
{block name="body"}
  <p>You were interested in:</p>
  {foreach $pages as $page}
    <ul>
      <li>{$page}</li>
    </ul>
  {/foreach}
{/block}
