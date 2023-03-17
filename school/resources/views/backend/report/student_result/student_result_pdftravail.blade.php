@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  <button onclick="window.print()">imprimer</button>

		<!-- Main content -->
		<section class="content">
 <table border=0 id='tab2' cellpadding=0 cellspacing=0 width=1654 style='border-collapse:
 collapse;table-layout:fixed;width:1241pt'>
 <col width=190 style='mso-width-source:userset;mso-width-alt:6948;width:143pt'>
 <col width=80 span=14 style='width:60pt'>
 <col width=129 style='mso-width-source:userset;mso-width-alt:4717;width:97pt'>
 <col width=80 style='width:60pt'>
 <col width=135 style='mso-width-source:userset;mso-width-alt:4937;width:101pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 width=190 style='height:15.0pt;width:143pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=129 style='width:97pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=135 style='width:101pt'></td>
 </tr>
 <tr height=40 style='height:30.0pt;mso-xlrowspan:2'>
  <td height=40 colspan=18 style='height:30.0pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=25 style='height:18.75pt'>
  <td colspan=18 height=25 class=xl274 style='height:18.75pt'>Conseil de
  classes ( Semestre 1)</td>
 </tr>
 <tr height=25 style='height:18.75pt'>
  <td colspan=18 height=25 class=xl274 style='height:18.75pt'><span
  style='mso-spacerun:yes'> </span>10/06/2021</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
 <-!--> <td colspan=18 height=20 class=xl275 style='height:15.0pt'>Nombre des modules
  validés: 3/4</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl117 colspan=10 style='height:15.0pt;mso-ignore:colspan'><font
  class="font8">Principes de passage en S2 </font><font class="font14"><span
  style='mso-spacerun:yes'>  </span>: L'étudiant doit valider 3 modules sur 4
  dont obligatoirement celui de l'Architecture, Il doit avoir la moyenne en
  atelier d'Architecture.<span style='mso-spacerun:yes'> </span></font></td>
  <td class=xl118></td>
  <td class=xl119></td>
  <td class=xl119></td>
  <td class=xl119></td>
  <td class=xl120></td>
  <td class=xl118></td>
  <td class=xl117></td>
  <td class=xl117></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl117 colspan=8 style='height:15.0pt;mso-ignore:colspan'>les
  matières non validées dont la note est &gt; à 5 peuvent être rattrapées,
  celles &lt; à 5 doivent être refaites quelque soit la moyenne du module.</td>
  <td class=xl119></td>
  <td class=xl117></td>
  <td class=xl118></td>
  <td class=xl119></td>
  <td class=xl119></td>
  <td class=xl119></td>
  <td class=xl120></td>
  <td class=xl118></td>
  <td class=xl117></td>
  <td></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 style='height:15.0pt'></td>
  <td class=xl121></td>
  <td class=xl122></td>
  <td class=xl121></td>
  <td class=xl122></td>
  <td class=xl122></td>
  <td class=xl122></td>
  <td class=xl121></td>
  <td class=xl122></td>
  <td></td>
  <td class=xl121></td>
  <td class=xl122></td>
  <td class=xl122></td>
  <td class=xl122></td>
  <td class=xl123></td>
  <td class=xl121></td>
  <td colspan=2 style='mso-ignore:colspan'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl124 style='height:15.0pt'>Module</td>
  <?php 
 // Sem Module
           $data = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get();
           $nbr_modules = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get()->count();
         
         

 ?>
  <!--Boucle modules-->
  <td colspan=3 class=xl276 style='border-right:.5pt solid black;border-left:
  none'>UEL 1</td>
  <td class=xl125>&nbsp;</td>
  <td class=xl126>&nbsp;</td>
  <td class=xl126>&nbsp;</td>
 </tr>
 <!--FIn Boucle modules-->
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl127 style='height:45.0pt;border-top:none'>Nom &amp;
  prenom</td>
    <!--Boucle elements de ce module-->
  <td class=xl128 width=80 style='border-top:none;border-left:none;width:60pt'>Ateliers
  d'Architecture</td>
  <td class=xl129 width=80 style='border-top:none;border-left:none;width:60pt'>Dessin
  et Expression Plastique</td>
   <!--FIn Boucle elements-->
  <td class=xl130 width=80 style='border-top:none;border-left:none;width:60pt'>Moyenne
  1</td>
  <td class=xl132 width=129 style='border-top:none;border-left:none;width:97pt'>MOYENNE
  GENERALE<span style='mso-spacerun:yes'> </span></td>
  <td class=xl132 width=80 style='border-top:none;border-left:none;width:60pt'>Décision
  conseil de classes<span style='mso-spacerun:yes'> </span></td>
  <td class=xl132 width=135 style='border-top:none;border-left:none;width:101pt'>Obesrvation<span
  style='mso-spacerun:yes'> </span></td>
 </tr>
     <!--Boucle StudentMarks-->
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl133 style='height:15.75pt;border-top:none'>xxxx</td>
  <td class=xl134 style='border-top:none;border-left:none'>12.07</td>
  <td class=xl135 style='border-top:none;border-left:none'>12.66</td>
  <td class=xl134 style='border-top:none;border-left:none'>12.07</td>
  <td class=xl135 style='border-top:none;border-left:none'>12.66</td>

  <td class=xl69 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl69 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
     <!--Fin Boucle StudentMarks-->
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=190 style='width:143pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=129 style='width:97pt'></td>
  <td width=80 style='width:60pt'></td>
  <td width=135 style='width:101pt'></td>
 </tr>
 <![endif]>
</table>
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
 
@endsection
