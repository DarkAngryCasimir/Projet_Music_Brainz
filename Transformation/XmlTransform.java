/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package xmltransform;

import java.io.File;
import javax.naming.spi.DirStateFactory.Result;
import javax.xml.transform.Source;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerConfigurationException;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;

/**
 *
 * @author PlaZi
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws TransformerConfigurationException, TransformerException {
	
		String folderPath = "";
		     
    	
        File xmlFile = new File(folderPath + "musicbrainz__artist.xml");
        File xsltFile = new File(folderPath + "musicbrainz__artist.xsl");
        File htmlFile = new File(folderPath + "xmltransformtest_artist.xml");
        
        Source xmlSource = new StreamSource(xmlFile);
        Source xsltSource = new StreamSource(xsltFile);
        StreamResult htmlResult = new StreamResult(htmlFile);
        TransformerFactory transFact = TransformerFactory.newInstance();
        Transformer trans = transFact.newTransformer(xsltSource);
        trans.transform(xmlSource, htmlResult);
    }

}
