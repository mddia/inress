-- -------------------------------------------------------------------<br />
-- <strong>REQUÊTES SQL : Insertion des routages pour le mag {$aboTitle} n°{$numero}</strong><br />
-- -------------------------------------------------------------------<br />
<br />
<br />
-- ------------- <strong>MISE À JOUR TABLE in_magazine</strong> ------------- <br />
UPDATE in_magazine SET routage = '{$timestamp}' WHERE numero = '{$numero}' AND aboId = {$aboId} LIMIT 1;<br />
<br />
<br />
-- ------------- MyINREES abonnés  ------------- <br />
<br />
{foreach from=$myPayants.data item='my'}
	INSERT INTO in_emailsmagenvoi VALUES('', '{$numero}', '{$aboId}', '{$my.user.id}');<br />
{/foreach}
<br />
<br />
-- ------------- MyINREES gratuits  ------------- <br />
<br />
{foreach from=$myGratuits.data item='my'}
	INSERT INTO in_emailsmagenvoi VALUES('', '{$numero}', '{$aboId}', '{$my.user.id}');<br />
{/foreach}