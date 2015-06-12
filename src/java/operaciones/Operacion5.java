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
public class Operacion5 extends Operacion{
    //OPERACION PARA REINICIAR EL SERVICIO DE OPENTHINCLIENT
    @Override
    public void operacion(HttpServletResponse response) {
        try (PrintWriter out = response.getWriter()){            
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/thinclient/restartThinclient");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String linea;            
        } catch (IOException | InterruptedException ex) {
            System.out.print(ex);
        }
    }
    
}
