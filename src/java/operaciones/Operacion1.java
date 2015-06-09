/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package operaciones;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author LFOM
 */
public class Operacion1 extends Operacion{
    //OPERACION PARA VER EL ESTADO DEL SERVICIO DE OWNCLOUD 
    @Override
    public void operacion(HttpServletResponse response) {
        //String status="running.";
        try (PrintWriter out = response.getWriter()){
            //CODIGO BOOTSTRAP PARA MOSTRAR LA TABLA DE ESTADOS
            out.write("<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">"
                    + "<div class='container'>"
                        + "<div class='text-center'>"
                            + "<table class='table'>"
                                + "<tr class='active'>"
                                    + "<td>Servicio</td>"
                                    + "<td>Estado</td>"
                                + "</tr>"
                                + "<tr class='active'>"); 
            //EJECUCION DEL SCRIPT DE ESTADO DE OWNCLOUD
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/owncloud/statusOwncloud");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String linea;
            //EJECUCION DEL SCRIPT DE ESTADO DE OPENTHINCLIENT
            Runtime runtimeThin = Runtime.getRuntime();
            Process processThin = runtime.exec("/opt/script/thinclient/statusThinclient");
            processThin.waitFor();
            BufferedReader bufferThin = new BufferedReader (new InputStreamReader(processThin.getInputStream()));
            String lineaThin;
            // COMIENZA EL BUCLE
            /*MODIFICAR USANDO SWITCH*/
            while ((linea = buffer.readLine()) != null && (lineaThin = bufferThin.readLine()) != null ) {                
                if (linea.endsWith("running")){
                    out.write("<td><img class='img-rounded' src='images/owncloud.png' height='55' width='60'></td>"
                             + "<td><img class='img-rounded' src='images/encendido.png' height='42' width='42'></td>");
                } else if(lineaThin.endsWith("running")) {
                    out.write("<tr><td><img class='img-rounded' src='images/thinclient.png' height='55' width='60'></td>"
                             + "<td><img class='img-rounded' src='images/encendido.png' height='42' width='42'></td></tr>");
                }
                else {
                    out.write("<td><img class='img-rounded' src='images/owncloud.png' height='55' width='60'></td>"
                             + "<td><img class='img-rounded' src='images/apagado.png' height='42' width='42'></td>");
                }                
            } //final de bucle while
            out.write(  "</tr>");
            out.write("</div>"
                    + "</div>");// cierres de Div conainer y text-center
        } catch (IOException | InterruptedException ex) {
            System.out.print(ex);
        }
    }
    
}
