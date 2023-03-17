@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  <button onclick="window.print()">imprimer</button>

		<!-- Main content -->
		<section class="content">
		  <table id='tab1' border=0 cellpadding=0 cellspacing=0 width=881 style='border-collapse:
 collapse;table-layout:fixed;width:661pt'>
 <col width=80 style='width:60pt'>
 <col width=253 style='mso-width-source:userset;mso-width-alt:9252;width:190pt'>
 <col width=115 style='mso-width-source:userset;mso-width-alt:4205;width:86pt'>
 <col width=112 style='mso-width-source:userset;mso-width-alt:4096;width:84pt'>
 <col width=137 style='mso-width-source:userset;mso-width-alt:5010;width:103pt'>
 <col width=184 style='mso-width-source:userset;mso-width-alt:6729;width:138pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 width=80 style='height:15.0pt;width:60pt' align=left
  valign=top>
 <![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:2;margin-left:3px;margin-top:9px;width:51px;
  height:53px'><img width=51 height=53 src="{{ asset('releve/image001.png') }} " v:shapes="_x0000_s1026"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0 >
   <tr>
    <td height=20 width=80 style='height:15.0pt;width:60pt'></td>
   </tr>
  </table>
  </span></td>
  <td width=253 style='width:190pt' align=left valign=top>
<![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:16px;margin-top:4px;width:64px;
  height:1px'><img width=64 height=1 src="{{ asset('releve/image004.png') }} " v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=20 class=xl140 width=253 style='height:15.0pt;width:190pt'>ROYAUME
    DU MAROC<span style='mso-spacerun:yes'> </span></td>
   </tr>
  </table>
  </span></td>
  <td class=xl141 width=115 style='width:86pt'></td>
  <td class=xl141 width=112 style='width:84pt'></td>
  <td colspan=2 class=xl288 width=321 style='width:241pt'><span
  style='mso-spacerun:yes'>                 </span>Année Universitaire
  {{ $allMarks['0']['annee']['name'] }}</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 style='height:15.0pt'></td>
  <td class=xl140>Ecole Nationale d’Architecture<span
  style='mso-spacerun:yes'> </span></td>
  <td class=xl141></td>
  <td class=xl141></td>
  <td class=xl142></td>
  <td class=xl143></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 style='height:15.0pt'></td>
  <td class=xl144>Agadir</td>
  <td colspan=3 style='mso-ignore:colspan'></td>
  <td align=left valign=top>
  <![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:3;margin-left:32px;margin-top:3px;width:147px;
  height:162px'><img width=147 height=162 src="{{  (!empty($allMarks['0']['student']['image']))? url('upload/student_images/'.$allMarks['0']['student']['image']):url('upload/user-icon.png') }}"   v:shapes="Image_x0020_6"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td height=20 class=xl145 width=184 style='height:15.0pt;width:138pt'></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 style='height:15.0pt'></td>
  <td class=xl141></td>
  <td colspan=3 style='mso-ignore:colspan'></td>
  <td class=xl141></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 style='height:15.75pt'></td>
  <td class=xl141></td>
  <td colspan=3 style='mso-ignore:colspan'></td>
  <td class=xl141></td>
 </tr>
 <tr height=25 style='height:18.75pt'>
  <td colspan=5 height=25 class=xl289 style='border-right:1.0pt solid black;
  height:18.75pt'>RELEVE DE NOTES</td>
  <td class=xl141></td>
 </tr>
 <tr height=26 style='height:19.5pt'>
  <td colspan=5 height=26 class=xl292 style='border-right:1.0pt solid black;
  height:19.5pt'>Semestre <?php
   $int =filter_var($allMarks['0']['semestre']['name'],FILTER_SANITIZE_NUMBER_INT);
  echo($int);?>
  </td> <!--Semestre-->
  <td class=xl141></td>
 </tr>
 <tr height=25 style='height:18.75pt'>
  <td height=25 class=xl146 style='height:18.75pt'></td>
  <td class=xl146></td>
  <td class=xl146></td>
  <td class=xl146></td>
  <td class=xl146></td>
  <td class=xl141></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl147 colspan=2 style='height:15.75pt;mso-ignore:colspan'>NOM
  &amp; PRENOM: {{ $allMarks['0']['student']['nomfr'].' '.$allMarks['0']['student']['prenomfr'] }}</td><!--nom & prenom-->
  <td class=xl148></td>
  <td class=xl148></td>
  <td class=xl148></td>
  <td class=xl141></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl147 style='height:15.75pt'>Né ( e ) le : <?php echo date('d-m-Y', strtotime($allMarks['0']['student']['dateN'] ));?></td><!--Date naissance-->
  <td class=xl148></td>
  <td class=xl148></td>
  <td class=xl148></td>
  <td class=xl141></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl147 colspan=2 style='height:15.75pt;mso-ignore:colspan'>C.N.E
  : {{ $allMarks['0']['student']['cne'] }}</td><!--CNE-->
  <td class=xl148></td>
  <td class=xl148></td>
  <td class=xl148></td>
  <td></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 colspan=6 style='height:15.75pt;mso-ignore:colspan'></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=6 height=21 class=xl295 width=881 style='border-right:1.0pt solid black;
  height:15.75pt;width:661pt'></td> <!--Session-->
 </tr>
 <tr height=51 style='height:38.25pt' >
  <td colspan=2 height=51 class=xl298 style='height:38.25pt'>Module</td>
  <td class=xl149 style='border-top:none;border-left:none'>Coef</td>
  <td class=xl149 style='border-top:none;border-left:none'>Note</td>
  <td class=xl150 width=137 style='border-top:none;border-left:none;width:103pt'>Note
  de Rattrapage</td>
  <td class=xl151 width=184 style='border-top:none;border-left:none;width:138pt'>Moyenne
  du Module</td>
 </tr>
 
 <?php 
 // Sem Module
           $data = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get();
           $nbr_modules = App\Models\AssignElement::select('semestre_id','module_id')->groupBy('semestre_id','module_id')->get()->count();
         
         

 ?>

 
@php
// $assign_student = App\Models\AssignElement::where('year_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
 //$assign_student = App\Models\AssignElement::where('module_id',$allMarks['0']->year_id)->where('class_id',$allMarks['0']->class_id)->first();
// $data['detailsData'] = AssignElement::select('semestre_id','module_id')->where('semestre_id',$semestre_id)->groupBy('semestre_id','module_id')->get();
 $total_coef=0;
$moyenne_total=0;
 $j=0;
$mod_valid=0;
@endphp



@foreach($data as $key => $detail ) <!-- $detailData contient toute les enregistrements -->

      <?php 

               $i=1;
                //elements par module
                $dataModule = App\Models\AssignElement::select('*')->where('module_id',$detail['module']['id'])->get();
           //     $dataModule = App\Models\AssignElement::select('*')->where('module_id',$detail['student_module']['id'])->sum();
//count element par module
                $countModule = App\Models\AssignElement::select('semestre_id','module_id','element_id')->where('module_id',$detail['module']['id'])->get()->count();
               
                $somme_notes=0;
                $somme_coef=0;
               
                $moyenne_mod=0;
                $verifie=0;
      ?> 

    @foreach($dataModule as $key1 => $detail1 )
            <?php
            
           
              $elements_marks=App\Models\StudentMarks::select('marks')->where('annee_id',$allMarks['0']['annee']['id'])->where('semestre_id',$allMarks['0']['semestre']['id'])->where('module_id',$detail1['module_id'])->where('assign_subject_id',$detail1['id'])->where('cne',$allMarks['0']['student']['cne'])->get();
              $total_coef+=$detail1['coef_mark'];
              if($verifie == 0) {
              // echo "\n hello";
             
               
            ?>

          <tr height=39 style='mso-height-source:userset;height:29.25pt'>
                <td rowspan={{$countModule}} height=74 class=xl285 style='height:55.5pt;border-top:none'>{{$detail1['module']['name']}}</td>
                
                <td class=xl175 width=253 style='padding :3px;'>{{$detail1['element']['name']}}</td>
                <td class=xl153 style='border-left:none'>{{$detail1['coef_mark']}}</td> <!--coef///count ///-->
                <td class=xl154 style='border-left:none'>
              <?php 
              foreach( $elements_marks as $note => $details){
              echo($details['marks']);
              $somme_notes+=$details['marks']*$detail1['coef_mark'];
              $somme_coef+=$detail1['coef_mark'];
              }
              ?>
              </td><!--note element-->
                <td class=xl155 style='border-left:none'>&nbsp;</td>
                <td rowspan={{$countModule}} class=xl287 style="border:1px solid black" id="<?php echo $j;?>">
                
              </td><!--moyenne module-->
          </tr>
            
            <?php 
            } else{
           if ($i < $countModule){
            ?>
          <!-- boucle for par rapport a rowspan count number of row-->
          <tr height=35 style='mso-height-source:userset;height:26.25pt; border:1px solid black' >
                <td height=35 class=xl175 width=253 style='padding :3px;height:26.25pt;border-top:none;border-left: none'>{{$detail1['element']['name']}}</td>
                <td class=xl157 style='border-top:none;border-left:none'> {{$detail1['coef_mark']}}</td><!--coef-->
                <td class=xl158 style='border-top:none;border-left:none'>
                <?php 
              foreach( $elements_marks as $note => $details){
              echo($details['marks']);
              $somme_notes+=$details['marks']*$detail1['coef_mark'];
              $somme_coef+=$detail1['coef_mark'];
          $moyenne_mod=(float)$somme_notes/$somme_coef;
        }
              ?>
              <script>
              document.getElementById("<?php echo $j;?>").innerHTML={{ number_format((float)$moyenne_mod,2) }};
              </script>
              </td><!--note element-->
                <td class=xl159 style='border-top:none;border-left:none'>&nbsp;</td>
          </tr>
          <?php
          $i++;          
         

        }        
             
             
          ?>

           <?php }          $verifie = 1;
                       
            ?>

              <?php ?>
      @endforeach           
      <?php
          $j++; if($moyenne_mod>10){$mod_valid++;}
          $moyenne_total+= $somme_notes;
        //  $moyenne_total+= $moyenne_mod*$somme_coef;
      ?>       
             
                  
  @endforeach


 <tr height=26 style='height:19.5pt'>
  <td colspan=2 height=26 class=xl324 style='height:19.5pt'>TOTAL</td>
  <td class=xl177 style='border-left:none'>{{ $total_coef }}</td><!--total coeff-->
  <td colspan=3 class=xl326 style='border-right:1.0pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=26 style='height:19.5pt'>
  <td colspan=2 height=26 class=xl328 style='height:19.5pt'>Moyenne Générale</td>
  <td colspan=4 class=xl329 style='border-right:1.0pt solid black;border-left:
  none'>
  <?php echo number_format((float)$moyenne_total/$total_coef,2);?></td><!--moyenne generale-->
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl180 colspan=2 style='height:15.0pt;mso-ignore:colspan'>Nombre
 des modules validés: {{ $mod_valid }}/{{ $nbr_modules }}</td><!--nbr module valide -->
  <td class=xl182 style='border-top:none'>&nbsp;</td>
  <td class=xl182 style='border-top:none'>&nbsp;</td>
  <td class=xl182 style='border-top:none'>&nbsp;</td>
  <td class=xl183 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl184 colspan=6 style='height:15.0pt;mso-ignore:colspan;
  border-right:1.0pt solid black'><font class="font22">Principes de passage en
  S<?php 
  $int++;
  echo($int);
  ?></font><font class="font14">: L'étudiant doit valider 
  obligatoirement l'Architecture. Il doit avoir la moyenne<span
  style='mso-spacerun:yes'> </span></font></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl184 colspan=6 style='height:15.0pt;mso-ignore:colspan;
  border-right:1.0pt solid black'>en atelier d'Architecture. Les matières non
  validées dont la note est<span style='mso-spacerun:yes'>  </span>&gt; à<span
  style='mso-spacerun:yes'>  </span>5 peuvent être rattrapées, celles<span
  style='mso-spacerun:yes'>  </span>&lt; à 5 doivent être refaites quelque soit
  la<span style='mso-spacerun:yes'> </span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl186 colspan=2 style='height:15.75pt;mso-ignore:colspan'>moyenne
  du module.</td>
  <td class=xl187>&nbsp;</td>
  <td class=xl187>&nbsp;</td>
  <td class=xl187>&nbsp;</td>
  <td class=xl188>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=6 rowspan=2 height=41 class=xl332 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;height:30.75pt'>Décision et observation du
  conseil</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
 </tr>
 <tr height=40 style='height:15.0pt'>
  <td colspan=4 rowspan=8 height=161 class=xl299 width=560 style='border-right:
  .5pt solid black;border-bottom:1.0pt solid black;height:120.75pt;width:420pt'></td><!--decision -->
  <td colspan=2 rowspan=3 class=xl308 style='border-right:1.0pt solid black;
  border-bottom:.5pt solid black'>Signature</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
 </tr>
 <tr height=20 style='height:15.0pt'>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 rowspan=5 height=101 class=xl314 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black;height:75.75pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
 </tr>
 <tr height=20 style='height:15.0pt'>
 </tr>
 <tr height=20 style='height:15.0pt'>
 </tr>
 <tr height=21 style='height:15.75pt'>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=80 style='width:60pt'></td>
  <td width=253 style='width:190pt'></td>
  <td width=115 style='width:86pt'></td>
  <td width=112 style='width:84pt'></td>
  <td width=137 style='width:103pt'></td>
  <td width=184 style='width:138pt'></td>
 </tr>
 <![endif]>
</table>


		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
 

 

@endsection
