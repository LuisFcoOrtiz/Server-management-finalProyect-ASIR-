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
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author LFOM
 */
public class Operacion8 extends Operacion{
    //OPERACION PARA REALIZAR UN BACKUP DE OWNCLOUD
    @Override
    public void operacion(HttpServletResponse response) {
        //String status="running.";
        try (PrintWriter out = response.getWriter()){
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/owncloud/backupOwncloud");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String linea;    
        } catch (IOException ex) {
            System.out.print(ex);
        } catch (InterruptedException ex) {
            Logger.getLogger(Operacion8.class.getName()).log(Level.SEVERE, null, ex);
        }
    } //Final de metodo
    
} //Final de la clase operacion8
