
import static org.junit.jupiter.api.Assertions.*;

import java.util.concurrent.TimeUnit;

import org.junit.Before;
import org.junit.jupiter.api.*;
import org.junit.jupiter.api.MethodOrderer.OrderAnnotation;
import org.junit.jupiter.api.TestInstance.Lifecycle;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;

import com.inflectra.spiratest.addons.junitextension.SpiraTestCase;
import com.inflectra.spiratest.addons.junitextension.SpiraTestConfiguration;

/**
 * 
 * @author Homy
 * @version 1.0
 * @since 09/2019 This code is a base code for RMIT Software Testing/ Selenium Lab Assessment.
 *        You may need to change the webpage target and test methods based on your assessment spec.
 *        You can send email to amirhomayoon.ashrafzadeh@rmit.edu.au if you have any question
 *        Alternatively use your course Canvas forum Assessment specification is
 *        available on Canvas/Assignment
 * 
 */

/*
 * You must "junit 5 extension.jar" from SpiraTeam to your
 * project/properties/java build path, Library tab as an External Jar
 * 
 */

@SpiraTestConfiguration(
		// following are REQUIRED
		url = "https://rmit-university.spiraservice.net",
		login = "s3571902", 
		rssToken = "{273A79CE-344A-4CEA-93FC-3C493064523A}", 
		projectId = 625
// following are OPTIONAL
// releaseId = 7, testSetId = 1)
						)
@TestMethodOrder(OrderAnnotation.class) // << this annotation is for using @order, or adding order to my test-cases
public class Test1 {
	// define all your variables that you need to initialise through different tests
	private static ChromeDriver driver;
	private String expectedResult;
	private String actualResult;
	private WebElement element;
//	private WebDriverWait wait;
	

	@BeforeAll
	// setup my driver here through @BeforeAll, this method is running once before
	// all test-cases
	public static void setup() {
		
		// chromedriver must be replaced if it is not working or your operating system is not windows
		
		System.setProperty("Webdriver.chrome.driver", "chromedriver.exe");
		

		driver = new ChromeDriver();

	}

	@Test
	@Order(1) // << the order of the test, so this test-case is running as first
	@SpiraTestCase(testCaseId = 17215)
	
	public void gotoWebsite() {

driver.get("http://handshake.test/");
		
		driver.findElement(By.xpath("//*[@id=\'register_user\']")).click();;
		driver.findElement(By.xpath("//*[@id=\'app\']/main/div/div/div/div/div[2]/a")).click();
		driver.findElement(By.xpath("//*[@id=\'company_name\']")).sendKeys("Test1");
		driver.findElement(By.xpath("//*[@id=\'email\']")).sendKeys("test@test1.com");
		driver.findElement(By.xpath("//*[@id=\'password\']")).sendKeys("123456");
		driver.findElement(By.xpath("//*[@id=\'password-confirm\']")).sendKeys("123456");
		driver.findElement(By.xpath("//*[@id=\'contact_email\']")).sendKeys("test@test1.com");
		driver.findElement(By.xpath("//*[@id=\'contact_phone\']")).sendKeys("0411111111");
		driver.findElement(By.xpath("//*[@id=\'app\']/main/div/div/div/div/div[3]/form/div[7]/div/button")).click();
	
//		String text = driver.findElement(By.xpath("/html/body/div[2]")).getText();
//		if (text =="The email has already been taken.")
//			driver.quit();
		
		
		driver.findElement(By.xpath("//*[@id=\'email\']")).sendKeys("test@test1.com");
		driver.findElement(By.xpath("//*[@id=\'password\']")).sendKeys("123456");
		driver.findElement(By.xpath("//*[@id=\'app\']/main/div/div/div/div/div[3]/form/div[4]/div/button")).click();
		
		driver.findElement(By.xpath("//*[@id=\'employerDropdown\']")).click();
		driver.findElement(By.xpath("//*[@id=\'edit_employer\']")).click();
		
		driver.findElement(By.xpath("//*[@id=\'company_name\']")).sendKeys("Test1.2");
		driver.findElement(By.xpath("//*[@id=\'email\']")).sendKeys("test@test1.2.com");
		driver.findElement(By.xpath("//*[@id=\'contact_email\']")).sendKeys("test@test1.2.com");
		driver.findElement(By.xpath("//*[@id=\'contact_phone\']")).sendKeys("0422222222");
		driver.findElement(By.xpath("//*[@id=\'app\']/main/div/div/div/div/div[2]/form/div[5]/div/button")).click();
		

	}
		

	@AfterAll
	// closing or quitting the browser after the test
	public static void closeBrowser() {
	//	driver.close();
		driver.quit();
}
}

