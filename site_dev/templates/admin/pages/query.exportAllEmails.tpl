FIRSTNAME;LASTNAME;EMAIL_ORIGINE;EMAIL;EMVCELLPHONE;EMAIL_FORMAT;TITLE;DATEOFBIRTH;SEED;CLIENTURN;SOURCE;CODE;SEGMENT;EMVADMIN1;EMVADMIN2;EMVADMIN3;EMVADMIN4;EMVADMIN5;CP;PAYS;MOTIVATION;DIVERSDESC;INSCRIPTION;VALIDITE;MYINREES;CB;PROFESSION_NUM;<br />
{foreach from=$users item='user'}
{$user.firstName};{$user.name};;{$user.email};;;;;{$user.selection};;;{$user.actif};;;;;;;{$user.zipCode};{$user.country};;;;;{$user.myInrees};{$user.cb};{$user.id};<br />
{/foreach}