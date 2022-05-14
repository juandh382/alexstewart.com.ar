<?php

if (isset($_REQUEST['option']) && $_REQUEST['option'] == '1') {
    $texto .= "<p>En el área geoquímica, Alex Stewart International Argentina  brinda un servicio completo de inspección, muestreo y análisis de metales y minerales. Éstos incluyen concentrados, doré, bullion, muestras geoquímicas, materiales ferrosos, metales preciosos, carbón y aleaciones. En la actualidad, la toma de decisiones apropiadas en la industria minera, depende cada vez más de la exactitud de los resultados analíticos obtenidos en los laboratorios.</p>";
    $texto .= "<h4>PREPARACIÓN</h4>";
    $texto .= "<ul>
                <li>Preparación de Muestras (Hornos de secado, Trituradoras Primarias y Secundarias, Cuarteadores Riffles y rotativos, Pulverizadoras, y proceso de Tamizado según Norma IRAM 1-501)</li>
                <li>Pre-tratamiento (Ensayo a Fuego para determinación de oro, plata y elementos del grupo de platino; Disolución por Agua Regia, Multi-ácidos y Oxidante; Fusión de Óxidos Mayoritarios y Sílice por Gravimetría ; Calcinación de arbustos y plantas silvestres)</li>
                <li>Métodos de Determinación de Elementos (Espectrofotometría de Absorción Atómica -AA-; Espectrofotometría de Emisión por Plasma de Argón -ICP-; Análisis de Salmueras; Determinación de mercurio por Vapor Frío; Micro-gravimetría, ICP-MS)</li>
                <li>Almacenaje y Custodia</li>
            </ul>";
    $titulo .= "GEOQUÍMICA";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '2') {
    $texto .= "<p>Alex Stewart International Argentina  cuenta con un laboratorio de análisis ambientales que abarca un amplio espectro de servicios en cuanto a las problemáticas ambientales claves en la actualidad.
                En Aguas y Efluentes realiza determinaciones de caracterización dentro del marco de normas y reglamentos, a través del análisis de sus propiedades físicas y químicas.
                En Aire se realizan las determinamos calidad de aire en estudios de impacto ambiental y calidad de aire laboral, acorde a las normativas vigentes.
                También se trabaja en la predicción de drenajes ácidos en rocas (ABA Test) que es un conjunto de pruebas predictivas realizadas con el propósito de caracterizar el potencial de drenaje ácido de material, como parte de los programas de manejo de residuos y movimientos de suelo o roca.
                Los trabajos efectuados por este laboratorio están realizados bajo Normativas internacionales tales como la US-EPA-SW-846 y Standard Methods for Examination of Water and Wastewater.</p>";
    $texto .= "<h4>Métodos de determinación de elementos</h4>";
    $texto .= "<ul>
                <li>Espectrofotometría de Absorción Atómica (AA)</li>
                <li>Espectrofotometría de Emisión por Plasma de Argón (ICP-OES)</li>
                <li>Espectrofotometría de Emisión por Plasma de Argón con Detección de Masas (ICP-MS)</li>
                <li>Determinación de mercurio por Vapor Frío (CVAA)</li>
                <li>Determinación de HTP por IR</li>
                <li>Micro – gravimetría</li>
                <li>Digestión por micro-ondas</li>
                <li>Disolución por sonicación</li>
               </ul>";
    $texto .= "<h4>Matrices</h4>";
    $texto .= "<ul>
                <li>Aguas Naturales, superficiales y subterráneas</li>
                <li>Aguas residuales urbanas e industriales</li>
                <li>Análisis de Aguas para Irrigación</li>
                <li>Aguas de bebida para ganado según la Ley 24585</li>
                <li>Suelos Agrícolas</li>
                <li>Suelos Industriales</li>
                <li>Calidad de aire en estudios de impacto ambiental</li>
                <li>Calidad de aire laboral</li>
               </ul>";
    $texto .= "<h4>Propiedades físicas y de agregación</h4>";
    $texto .= "<ul>
                <li>pH</li>
                <li>Conductividad</li>
                <li>Sólidos Disueltos, Totales y Suspendidos</li>
                <li>Sólidos sedimentales</li>
                <li>Alcalinidad</li>
                <li>Densidad</li>
                <li>Turbidez</li>
                <li>Color</li>
                <li>Olor</li>
                <li>Acidez</li>
               </ul>";
    $texto .= "<h4>Determinaciones</h4>";
    $texto .= "<ul>
                <li>Análisis de Fluoruros y Cloruros, usando la metodología de Ión Selectivo (ISE)</li>
                <li>DBO y DQO</li>
                <li>Sustancias tóxicas: Cianuros Libre, Total y WAD.</li>
                <li>Digestión de muestras con horno Micro-ondas.</li>
                <li>Metales traza por ICP-OES, con cuatro equipos de Plasma por Acoplamiento Inductivo Varian y Agilent.</li>
                <li>Metales Ultra-traza por Espectrofotometría de emisión con detección de masas (ICP-MS) con equipo Agilent 7700x.</li>
                <li>Análisis de Mercurio por vapor frío usando la técnica de Flow Injection Mercury Sistem</li>
                <li>Constituyentes inorgánicos no metálicos por Espectrofotometría UV-Visible: Amoníaco, nitritos y nitratos, Nitrógeno Kjheldal, fósforo total, soluble y asimilable, etc.</li>
                <li>Hidrocarburos Totales Petróleo por IR.</li>
                <li>Material Particulado Total en filtros de aire: Determinación gravimétrica de la masa depositada</li>
                <li>Digestión ácida de filtros de aire y Lectura por ICP-OES con determinación de 42 elementos</li>
               </ul>";
    $texto .= "<i>Normativas internacionales: US-EPA-SW-846 y Standard Methods for Examination of Water and Wastewater.</i><br /><br />";
    $texto .= "<strong style='color:black;'>ABA TEST: Predicción de Drenajes Acidos en Rocas</strong>";
    $texto .= "<p>ABA Test es un conjunto de pruebas predictivas realizadas con el propósito de caracterizar el potencial de drenaje ácido de material, como parte de los programas de manejo de residuos y movimientos de suelo o roca. Este ensayo conocido como ABA Test considera la relación existente entre el potencial ácido y el potencial de neutralización. Esta relación podría predecir el comportamiento de los residuos estériles con el tiempo, bajo las condiciones atmosféricas del lugar donde se encuentran.</p>";
    $texto .= "<strong style='color:black;'>MONITOREO AMBIENTAL</strong>";
    $texto .= "<p>Las necesidades de monitoreo y control ambiental toman cada vez mayor preponderancia en la sociedad actual, especialmente atendiendo a los objetivos de desarrollo sustentable que interesan tanto a la Industria como a Empresas del sector público y privado comprometidas con el ambiente, y según las exigencias de la legislación vigente.</p>";
    $texto .= "<p>Alex Stewart International Argentina  dispone de Laboratorios especializados en Análisis Ambientales con experiencia y capacidad para responder a los requerimientos más amplios y específicos en el área de control de efluentes industriales y domésticos, cuerpos receptores de efluentes y ambientes naturales. Nuestros servicios de Análisis abarcan todo tipo de matrices de interés para el monitoreo ambiental, trabajando bajo norma ISO 17025:2005/IRAM 301:2005, con los más altos estándares de calidad en la realización de ensayos de laboratorio y niveles de detección acordes a los valores guía indicados por la normativa local, provincial o nacional.</p>";
    $texto .= "<strong style='color:black;'>SERVICIOS ANALÍTICOS</strong>";
    $texto .= "<p>Contamos con analistas altamente capacitados en la determinación de parámetros indicadores de calidad ambiental aplicando metodologías estandarizadas de validez nacional e internacional (Standard Methods for The Examination of Water and Wastewater, EPA, ASTM, OSHA, etc).</p>";

    $titulo .= "AMBIENTAL";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '3') {
    $texto .= "<p>Alex Stewart International Argentina  cuenta con una oficina de inspecciones pensada para brindar apoyo especializado a la cadena de suministros de productos a granel o envasados. Las mismas permiten a sus clientes asegurar que se cumplen las especificaciones contractuales, higiénicas y sanitarias; así como protegerse de reclamos económicos en operaciones de carga y descarga de productos agroindustriales (cereales, oleaginosas, aceites vegetales, harinas y pellets, carnes, lácteos, azúcar, fertilizantes, subproductos derivados, entre otros.)</p>";
    $texto .= "<p>Nuestra oficina de inspecciones está certificada por diferentes organismos entre los que se encuentra GAFTA y FOSFA. A su vez, su gestión de calidad en todos sus servicios de inspección están avalados bajo la norma ISO 9001.</p>";
    $texto .= "<p>Algunos de los diferentes trabajos de <b style='color:black;'>inspecciones</b>, son: Pesaje; Muestreo; Análisis del proceso en cadena de suministro de mercaderías; Materia prima y procesada a granel y fraccionada.</p>";
    $texto .= "<p>Podemos realizar además Auditoria de daños y reportes fotográficos; Certificación; Control de infestación y de Fumigación, etc.</p>";
    $texto .= "<p>En <b style='color:black;'>Agencias y Operaciones Marítimas</b> igualmente ofrecemos servicios: On-hire / Off-hire survey; Condition survey; Bunker survey.; Sondajes / ullages; Evaluación y reportes de daños.</p>";


    $titulo .= "AGROINDUSTRIALES";
}

if (isset($_REQUEST['option']) && $_REQUEST['option'] == '4') {
    $texto .= "<p>Nos encontramos a la vanguardia en el servicio de inspección, verificación, análisis y certificación de embarques de minerales.</p>";
    $texto .= "<p>Las transacciones comerciales internacionales exigen a los implicados garantías de entidades imparciales que aseguren la conformidad en todas las etapas del proceso de compra y venta de bienes. Esto sólo se logra con un reporte in situ que registre de forma rápida y confiable la calidad, cantidad, volumen, peso, humedad y todos los aspectos específicos del producto.</p>";
    $texto .= "<p>Alex Stewart en su división de Inspecciones Comerciales de Minería cuenta con personal altamente capacitado y con amplia experiencia en el cuidado de la identidad e integridad de las muestras. Esto permite la confidencialidad de los datos, su trazabilidad, la definición precisa de los métodos de muestreo, preparación y análisis químicos, siempre bajo normas y estándares internacionales.</p>";
    $texto .= "<p>Los servicios que abarca la inspección de minerales se ofrecen en cualquier punto del territorio nacional y La acreditación de los procesos se realiza mediante la extensión de Certificados de fotos, pesos embarcados, leyes ponderadas y detalle de los procesos realizados. Los servicios de inspección incluyen:</p>";
    $texto .= "<p>En <b style='color:black;'>Agencias y Operaciones Marítimas</b> igualmente ofrecemos servicios: On-hire / Off-hire survey; Condition survey; Bunker survey.; Sondajes / ullages; Evaluación y reportes de daños.</p>";
    $texto .= "<ul>
                <li>Control de Embarques</li>
                <li>Control de Consolidaciones</li>
                <li>Control de Muestreos</li>
                <li>Control de Peso</li>
                <li>Determinación de humedad</li>
                <li>Preparación de muestra de calidad y posterior análisis en laboratorio de concentrados</li>
                <li>Supervisión de todas las operaciones</li>
                <li>Toma de muestras</li>
                <li>Verificación de pesos</li>
                <li>Inventarios de Stock en Minas, con muestreos y determinaciones, analizando distintos materiales como precipitados, concentrados, Doré, y cubicando mineral en canchas (stock piles) por medio de levantamiento topográfico</li>               
               </ul>";
    $titulo .= "MINERALES";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '1') {
    $texto .="<img src='./images/Certificados/ISO9001.jpg' class='img img-responsive' alt='' />";
    $titulo .="ISO 9001";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '2') {
$texto = '<iframe src="./images/Certificados/17025(2018).pdf" style="width:800px; height:600px;" frameborder="0"></iframe>';
    //$texto .="<img src='./images/Certificados/AcreditacionOAAISO17025(2017).png' class='img img-responsive' alt='' />";
    $titulo .="ISO 17025";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '3') {
	
    $texto .="<img src='./images/Certificados/AlcanceAcreditacionOAAISO17025(2017).png' class='img img-responsive' alt='' />";
    $titulo .="ISO 17025 Alcance";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '4') {
    $texto .="<img src='./images/Certificados/ISO14001.jpg' class='img img-responsive' alt='' />";
    $titulo .=" ISO 14001";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '5') {
    $texto .="<a href='./images/Certificados/CAA N452 - RP - Vto 31-03-20.pdf' target='_BLANK'>Click aquí si no puede visualizarlo (QA-QC)</a>";
    $texto .='<iframe src="./images/Certificados/CAA N452 - RP - Vto 31-03-20.pdf" style="width:800px; height:600px;" frameborder="0"></iframe>';
    //$texto .="<img src='./images/Certificados/Certificado ambiental G-452 Lab RP.jpg' class='img img-responsive' alt='' />";
    $titulo .="Certificado ambiental G-452 Lab RP";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '6') {
    $texto .="<a href='./images/Certificados/CAA N813 Maza Vto 31-03-20.pdf' target='_BLANK'>Click aquí si no puede visualizarlo (QA-QC)</a>";
    $texto .='<iframe src="./images/Certificados/CAA N813 Maza Vto 31-03-20.pdf" style="width:800px; height:600px;" frameborder="0"></iframe>';
    //$texto .="<img src='./images/Certificados/Certificado ambiental G-813 Lab Maza.jpg' class='img img-responsive' alt='' />";
    $titulo .="Certificado ambiental G-813 Lab Maza";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '7') {
    $texto .="<a href='./images/Certificados/CAAN525PMVto19-06-19.pdf' target='_BLANK'>Click aquí si no puede visualizarlo (QA-QC)</a>";
    $texto .='<iframe src="./images/Certificados/CAAN525PMVto19-06-19.pdf" style="width:800px; height:600px;" frameborder="0"></iframe>';
    //$texto .="<img src='./images/Certificados/CAA generador de residuos peligrosos-PM.jpg' class='img img-responsive' alt='' />";
    $titulo .="CAA generador de residuos peligrosos-PM";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '8') {
    $texto .="<img src='./images/Certificados/Declaratoria Impacto Ambiental SMA 2015.jpg' class='img img-responsive' alt='' />";
    $titulo .="Declaratoria Impacto Ambiental SMA 2015";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '9') {
    $texto .="<img src='./images/Certificados/geostats_1.jpg' class='img img-responsive' alt='' />";
    $titulo .="GEOSTATS";
}
if (isset($_REQUEST['optionimg']) && $_REQUEST['optionimg'] == '10') {
    $texto .="<img src='./images/Certificados/canmet_1.jpg' class='img img-responsive' alt='' />";
    $titulo .="CANMET";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '5') {
    $texto .= "<p>Alex Stewart Argentina se esfuerza constantemente en alcanzar los estándares de calidad internacionales que les aseguran a sus clientes la mayor confiabilidad en todos sus servicios. Para ello contamos con la certificación en la norma Norma <a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('1')>ISO 9001:2015</a> en Mendoza, Perito Moreno y Buenos Aires.</p>";
    $texto .= "<p>No siendo suficiente para nosotros certificar nuestros laboratorios bajo un sistema de gestión de la calidad, hemos logrado la acreditación de la Norma <a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('2')>ISO 17025:2005</a>; <a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('3')>Alcance 17025:2005 </a> en determinaciones que nos ubican a la vanguardia en este rubro:</p>";
    $texto .= "<ul>
                <li>Determinación de Oro por ensayo a fuego y lectura con espectrofotometría de Absorción Atómica, en matrices minerales.</li>
                <li>Determinaciones de Litio y Potasio por análisis por ICP en matrices de salmueras líquidas.</li>
               </ul>";
    $texto .= "<p>También enfocamos nuestro mayor esfuerzo en brindar a la comunidad y al medio ambiente un servicio que se comprometa responsablemente con todo lo que implica la gestión ambiental. Por tal motivo desde hace años venimos trabajando bajo la certificación en <a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('4')>ISO 14001:2015</a> en la provincia de Mendoza, Perito Moreno y continuamos implementando la misma en el resto de las unidades operativas del país.</p>";
    $texto .= "<p>Las tres normas citadas constituyen así nuestro Sistema de Gestión Integral.</p>";

    $texto .= "<h4>Habilitaciones Ambientales</h4>";
    $texto .= "<ul>
                <li><a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('5')>Certificado Rodriguez Peña 1140, Maipú,Mendoza.</a></li>
                <li><a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('6')>Certificado J. A. Maza 3119, Maipú,Mendoza.</a></li>
                <li><a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('7')>CAA generador de residuos peligrosos-PM</a></li>
                
               </ul>";
    $texto .= "<h4>Aseguramiento y Control de la Calidad</h4>";
    $texto .= "<p>Para brindar un QA/QC confiable, que le permita al cliente tener un servicio respaldado no solo por la implementación de normas, hemos desarrollado una conducta de trabajo avalada por nuestra experiencia, conocimientos, equipamiento, digitalización y comparaciones de ensayos de aptitud a nivel internacional.</p>";
    $texto .="Para más información <br /><a href='../noticias/ASi-QA-QC.pdf' target='_BLANK'>Click aquí (QA-QC)</a>";
    $texto .= '<object data="../noticias/ASi-QA-QC.pdf" type="application/pdf" style="width:100%;height:250px"><embed src="../noticias/ASi-QA-QC.pdf" type="application/pdf" /></object>';
//    $texto .= "<h4>QA (Aseguramiento de la Calidad)</h4>";
//    $texto .= "<p>Staff altamente capacitado (personal mayoritario en planta permanente).</p>
//                <p>Instalaciones adecuadas.</p>";
//    $texto .= "<h4>Muestrera</h4>";
//    $texto .= "<ul>
//                <li>Tratamiento de 800 muestras/día.</li>
//                <li>Horno de sacado 2200 muestras/día.</li>
//                <li>Trituradoras primarias y secundarias.</li>
//                <li>Salas de Cuarteo con cuarteadores Riffle de 24 y 36 canales.</li>
//                <li>Pulverizadoras</li>
//               </ul>";
//    $texto .= "<h4>Laboratorio</h4>";
//    $texto .= "<ul>
//                <li>Horno de copelación y de Fundición.</li>
//                <li>Muflas.</li>
//                <li>Balanzas granatarias, analíticas y Microbalanzas.</li>
//                <li>Turbidímetro.</li>
//                <li>Estufa de cultivo para determinación de DBO.</li>
//                <li>Digestor para DQO.</li>
//                <li>Equipo para destilación de Cianuro.</li>
//                <li>Espectrofotómetro IR para determinación de Hidrocarburos.</li>
//                <li>Espectrofotómetro UV-Vis.</li>
//                <li>Equipos de AA por llama con muestreador automático.</li>
//                <li>FIMS para determinación de Hg.</li>
//                <li>Equipos de ICP-OES con muestreador automático.</li>
//                <li>Equipo de ICP-MS con muestreador automático.</li>
//                <li>Horno de digestión de muestras por Microondas.</li>
//                <li>Generador de agua ultrapura.</li>
//               </ul>";
//    $texto .= "  <p>Gestión de calibración y mantenimiento de equipos.</p>
//            <p>Condiciones de temperatura y humedad controlados.</p>
//            <p>Trazabilidad de la muestra desde la recepción a la emisión del informe final.</p>
//            <p>Guarda de muestra controlada.</p>
//            <p>Validación metodológica.</p>";
//
//    $texto .= "<ul>
//        <li>Exactitud (Sesgo).</li>
//        <li>Precisión (repetibilidad, precisión intermedia y reproducibilidad).</li>
//        <li>Z-scores.</li>
//        <li>Intervalo de confianza.</li>
//        <li>Límites de:</li>
//            <ul>
//            <li>de detección instrumental.</li>
//            <li>del método y cuantificación.</li>
//            </ul>
//        </ul>
//        <li>Cálculo de Incertidumbre.</li>
//        <li>Ensayos de Robustez.</li>";
//    $texto .= "<h4>Interlaboratorios</h4>";
//    $texto .= "<ul>
//        <li><a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('9')>GEOSTATS PTY LTD, Mining Industry Consultants.</a></li>
//        <li>Resultados de Z-Scores del orden de 0.5 (tolerancia 2) en todos los elementos analizados por Ensayo a Fuego e ICP.</li>
//        <li><a href=# data-toggle=modal data-target=#myModalimg onclick=loadimg('10')>CANMET Mining and Mineral Sciences Laboratories.</a></li>
//        <li>QAP, Programa de Ensayos de Aptitud en Minerales concentrados en Pb, Sn y Zn desde el año 2012.</li>
//        <li>ROUND ROBIN para la determinación de Li y K en salmueras líquidas y preparación de MR.</li>
//        <li>Interlaboratorios (Round Robins) in House, con participación en numerosos Round Robins de control y preparación de MR para diferentes matrices.</li>
//        </ul>";
//    $texto .= "<h4>QC (Control de Calidad) Muestrera</h4>";
//    $texto .= "<ul>
//        <li>Chancado secundario</li>
//        <ul>
//        <li>Control cada 30 muestras con estado granulométrico 80% menor a 10#.</li>
//        <li>Acciones correctivas.</li>
//        </ul>
//        <li>Pulverizado</li>
//        <ul>
//        <li>Control cada 30 muestras con estado granulométrico 95% menor a 140#.</li>
//        <li>Acciones correctivas.</li>
//        </ul>
//        <li>Blanco al inicio de cada orden y cada 50 muestras.</li>
//        <li>BlancoDuplicado de cuarteo cada 50 muestras.</li>
//        </ul>";
//    $texto .= "<h4>Ensayo a Fuego</h4>";
//    $texto .= "<ul>
//        <li>1 o 2 Blancos de reactivo por planilla de trabajo.</li>
//        <li>1 o 2 Estándares certificados (Geostats) por planilla de trabajo.</li>
//        <li>Duplicado de muestra (pulpa) 5-10%.</li>
//        <li>Aplicación de criterios de aceptabilidad para los duplicados.</li>
//        </ul>";
//    $texto .= "<h4>ICP</h4>";
//    $texto .= "<ul>
//        <li>2 blancos de reactivo por planilla de trabajo.</li>
//        <li>3 a 5 Standard certificados (Geostats) por planilla de trabajo.</li>
//        <li>Duplicado de muestra (pulpa) 5-10%.</li>
//        <li>Aplicación de criterios de aceptabilidad para los duplicados.</li>
//        </ul>";
//    $texto .= "<h4>Desarrollo</h4>";
//    $texto .= "<ul>
//                <li>Metodologías analíticas a pedido.</li>
//               </ul>";
//    $texto .= "<h4>Informes</h4>";
//    $texto .= "<ul>
//                <li>Tiempo de entrega de resultados a convenir.</li>
//               </ul>";
//    $texto .= "<h4>LIMS</h4>";
//    $texto .= "<ul>
//                <li>Contamos con un LIMS (Laboratory Information Management System) con desarrollo propio. Permite llevar la trazabilidad de la muestra, conocer su estado y desarrollar un informe completo con toda la información requerida en ISO17025, incluyendo una sección de QA-QC.</li>
//                <li>Los informes son emitidos oficialmente en formato PDF, junto con formato Excel y csv. A pedido del cliente, se pueden generar formatos personalizados en csv que satisfagan las necesidades de las bases de datos </li>
//               </ul>";
//    $texto .= "<h4>Mejora continua</h4>";
//    $texto .= "<ul>
//                <li>Capacitación permanente.</li>
//                <li>Instalaciones y equipamiento.</li>
//                <li>En desarrollo de LIMS con información disponible desde la Web.</li>
//               </ul>";
    $texto .= "<h4>Alex Stewart International Argentina  adhiere a las siguientes organizaciones</h4>";
    $texto .= "<ul>
                <li>The Grain and Feed Trade Association (GAFTA).</li>
                <li>Federation of Oils, Seeds and Fats Associations (FOSFA).</li>
                <li>Servicio de Sanidad y Calidad Agroalimentaria (SENASA).</li>
                <li>Geostats PTY LTD (GEOSTATS).</li>
                <li>Minor Metals trade association (MMTA).</li>
                <li>Instituto Argentino de Normalización y Certificación (IRAM).</li>
                <li>Organismo Argentino de Acreditación (OAA).</li>
                <li>Organismo de certificación (DNV).</li>
                <li>Quality Assurance Partners (QAP).</li>
               </ul> <br />";
    //modificacion :::: agregar gafta fosfa senasa y geostat
    $texto .= '
                        <img src="../images/web/iram.png" alt="" />
                        <img src="../images/web/iso_dnv.png" alt="" width="100"/>
                        <img src="../images/web/oaa.png" alt="" />
                        <img src="../images/web/qap.png" alt="" />';

    $titulo .= "COMPROMISO CON LA CALIDAD";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '6') {

    $texto .="<a href='./images/Certificados/PoliticaCA-2018.pdf' target='_BLANK'>Click aquí si no puede visualizarlo (QA-QC)</a>";
    $texto .= '<iframe src="./images/Certificados/PoliticaCA-2018.pdf" style="width:800px; height:600px;" frameborder="0"></iframe>';
    $titulo .= "POLÍTICA DE CALIDAD Y AMBIENTE";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '7') {
    $texto .= "<ol style='padding-left:4rem;'>
                <li>INTRODUCCION</li>
                <li>SOLICITANTE</li>
                <li>LUGAR DE LA INSPECCION</li>
                <li>PERSONAL PRESENTE EN LA INSPECCION, por Alex Stewart Argentina</li>
                <li>PERSONAL PRESENTE EN LA INSPECCION, por parte de la empresa inspeccionada</li>
                <li>PERSONAL PRESENTE EN LA INSPECCION, por otras partes</li>
                <li>ACCIONES REALIZADAS</li>
                <li>ASPECTOS OPERACIONALES</li>
                <li>DIA DE LA INSPECCION</li>
                <li>HORA DE LA INSPECCION</li>
                <li>DETALLES GENERALES DEL CARGAMENTO</li>
                <li>CARACTERISTICAS DE LA CARGA</li>
                <li>RELATO DE ACONTECIMIENTOS</li>
                <li>INFORME FOTOGRAFICO</li>
                <li>ANALISIS DE LA DOCUMENTACION PRESENTADA</li>
                <li>RESULTADOS</li>
                <li>CONCLUSIÓN</li>
                <li>RECOMENDACIONES - SUGERENCIAS</li>
                <li>FECHA DEL INFORME</li>
                <li>FIRMA</li>                
                </ol>";
    $titulo .= "MODELO GENERAL";
}
if (isset($_REQUEST['option']) && $_REQUEST['option'] == '8') {
    $texto .= '<div class="titulo_boton" style="color:black">Podés ser parte de nuestro gran equipo de trabajo.</div>
                        <h4>Cargá tu currículum para trabajar con nosotros acá.</h4>
                        <div id="alerta_cv" class="alerta"></div>
                        <form id="formulario_enviar_cv" enctype="multipart/form-data">
                            <div class="col-lg-6">
                                <label for="" style="color:black">Tu nombre y apellido:</label><br>
                                <input  style="width:100%" id="nombre_trabaja_nosotros" type="text" name="nombre_trabaja_nosotros"/>
                            </div>
                            <div class="col-lg-6">
                                <label for="" style="color:black">Tu correo electrónico:</label><br>
                                <input  style="width:100%" id="email_trabaja_nosotros" type="email" name="email_trabaja_nosotros"/>
                            </div>
                            <div class="col-lg-6">
                                <label for="" style="color:black">Cargá tu CV:</label><br>
                                <input id="cv" type="file" name="archivo" accept="application/pdf,.docx,.doc"/>
                                
                            </div>
                        </form>
                        <div class="col-lg-6">
                            <div class="btn btn-success" style="bottom:auto;cursor:pointer;margin-top:2rem;margin-bottom:2rem;" onclick="enviar_cv()">Enviar</div>
                        </div>
                        <div class=row></div>
                        <p class="alert alert-warning"><label class="nota" style="color:black" >El formato del archivo debe ser PDF o DOC/DOCX</label></p>
                        
                        <hr>
                        <div class="text-center">
                            <h5>También podes cargar tu CV en:</h5><a href="http://www.postularse.com/alex.stewart.argentina" target="_blank"><img style="cursor:pointer" src="images/link_postularse.png?var=01" alt=""/></a>
                        </div>';
    $titulo .= "TRABAJÁ CON NOSOTROS";
}





$respuesta_xml = '';
$respuesta_xml .= '<?xml version="1.0" encoding="utf-8" standalone="yes"?>';
$respuesta_xml .= '<contenido>';
$respuesta_xml .= '<texto>' . $texto . '</texto>';
$respuesta_xml .= '<titulo>' . $titulo . '</titulo>';
$respuesta_xml .= '</contenido>';
echo $respuesta_xml;
