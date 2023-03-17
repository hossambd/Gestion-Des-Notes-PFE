@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css" media="print">
@media @print {}
@page{
  size: landscape;
  margin: 0;
}

</style>


 <div class="content-wrapper" style="width:100% ; " >
    <div class="container-full">
    <!-- Content Header (Page header) -->
      <button onclick="window.print()">imprimer</button>

    <!-- Main content -->
    <section class="content" style="zoom:59%" style="margin:0px ; padding:0px">
 <table style="margin:0px ; padding:0px" border=0 id='tab2' cellpadding=0 cellspacing=0 width=1654 style='border-collapse:
 collapse;table-layout:fixed;width:1241pt' >
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
  classes ( Semestre <?php
   $int =filter_var($allMarks['0']['semestre']['name'],FILTER_SANITIZE_NUMBER_INT);
  echo($int);?>)</td>
 </tr>
 <tr height=25 style='height:18.75pt'>
  <td colspan=18 height=25 class=xl274 style='height:18.75pt'><span
  style='mso-spacerun:yes'> </span> {{ date("d M Y") }}</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
 <!-- <td colspan=18 height=20 class=xl275 style='height:15.0pt'>Nombre des modules
  validés: 3/4</td>-->
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl117 colspan=10 style='height:15.0pt;mso-ignore:colspan'><font
  class="font8">Principes de passage </font><font class="font14"><span
  style='mso-spacerun:yes'>  </span>: L'étudiant doit avoir la moyenne en
  atelier d'Architecture.<span style='mso-spacerun:yes'> </span></font></td>
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
 <?php 
 // Sem Module
           $data = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get();
           $nbr_modules = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get()->count();
         
         

 ?>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl124 style='height:15.0pt'>Module</td>
  @foreach($data as $key1 => $detail1 )
  <?php 
           $countElement = App\Models\AssignElement::select('semestre_id','module_id','element_id')->where('module_id',$detail1['module']['id'])->get()->count();
           $countElement++;
  ?>
  <td colspan={{$countElement}} class=xl276 style='border-right:.5pt solid black;border-left:
  none'>{{$detail1['module']['name']}}</td>
  @endforeach 
  <td class=xl125>&nbsp;</td>
  <td class=xl126>&nbsp;</td>
  <td class=xl126>&nbsp;</td>
 </tr>
 <tr height=60 style='height:45.0pt'>
  <td height=60 class=xl127 style='height:45.0pt;border-top:none'>Nom &amp;
  prenom</td>
  @foreach($data as $key => $detail )

  <?php 

             
                $dataElement = App\Models\AssignElement::select('*')->where('module_id',$detail['module']['id'])->get();
    
                $countElement = App\Models\AssignElement::select('semestre_id','module_id','element_id')->where('module_id',$detail['module']['id'])->get()->count();
               
               
      ?>
    @foreach($dataElement as $key1 => $detail1 )
      
  <td class=xl128 width=80 style='border-top:none;border-left:none;width:60pt'>{{$detail1['element']['name']}}</td>
  
  @endforeach
  <td class=xl130 width=80 style='border-top:none;border-left:none;width:60pt'>Moyenne </td>
@endforeach



  <td class=xl132 width=129 style='border-top:none;border-left:none;width:97pt'>MOYENNE
  GENERALE<span style='mso-spacerun:yes'> </span></td>
  <td class=xl132 width=80 style='border-top:none;border-left:none;width:60pt'>Décision
  conseil de classes<span style='mso-spacerun:yes'> </span></td>
  <td class=xl132 width=135 style='border-top:none;border-left:none;width:101pt'>Obesrvation<span
  style='mso-spacerun:yes'> </span></td>
 </tr>
 

 <?php 


               $etudiants=App\Models\StudentMarks::select('*')->where('annee_id',$allMarks['0']['annee']['id'])->where('semestre_id',$allMarks['0']['semestre']['id'])->where('module_id',$detail1['module_id'])->where('assign_subject_id',$detail1['id'])->get();
  //dd($elements_marks);

 ?>

@foreach($etudiants as $key1 => $etudiant )
<tr height=21 style='height:15.75pt'>
<?php

//Etudiant
        $etudiant_name=App\Models\User::select('*')->where('cne',$etudiant['cne'])->get();
       // dd($etudiant_name['0']['nomfr']);
//$elements_marks=App\Models\StudentMarks::select('marks')->where('annee_id',$allMarks['0']['annee']['id'])->where('semestre_id',$allMarks['0']['semestre']['id'])->where('module_id',$detail1['module_id'])->where('assign_subject_id',$detail1['id'])->where('cne',$detail1['cne'])->get();

?>
  <td height=21 class=xl133 style='height:15.75pt;border-top:none;font-weight:bold;'>{{$etudiant_name['0']['nomfr'].' '.$etudiant_name['0']['prenomfr']}}</td>

  <?php 
 // Sem Module
           $modules = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get();
           $nbr_modules = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get()->count();  
           $total_notes = 0;
           $total_coef = 0;

 ?>
          @foreach($modules as $key2 => $module )

          <?php
          //MODULE
          $elements=App\Models\StudentMarks::select('marks','assign_subject_id')->where('annee_id',$allMarks['0']['annee']['id'])->where('semestre_id',$allMarks['0']['semestre']['id'])->where('module_id',$module['module_id'])->where('cne',$etudiant['cne'])->get();
         // dd($elements);
         $somme_coef=0;
         $somme_notes=0;

          ?>
                        @foreach($elements as $key3 => $element)

                          <td class=xl134 style='border-top:none;border-left:none'>{{$element['marks']}}</td>
                          <?php 
                                
                                $dataModule = App\Models\AssignElement::select('*')->where('id',$element['assign_subject_id'])->get();
                                $somme_coef+= $dataModule['0']['coef_mark']; 
                                $total_coef+=$dataModule['0']['coef_mark'];
                                //$total_coef+=$element['coef_mark'];
                              //  echo $element['coef_mark'];
                              //dd($element['assign_subject_id']);
                                $somme_notes+=$element['marks']*$dataModule['0']['coef_mark'];
                                $total_notes+=$element['marks']*$dataModule['0']['coef_mark'];
                          ?>
                          @endforeach
            <td class=xl135 style='border-top:none;border-left:none'><?php echo  number_format((float)$somme_notes/$somme_coef,2); ?></td>
            @endforeach
  
   
  



  <td class=xl139 style='border-top:none;border-left:none'><?php  echo  number_format((float)$total_notes/$total_coef,2); ?></td>
  <td class=xl69 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl69 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 @endforeach
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
    
</div>
  </div>
@endsection