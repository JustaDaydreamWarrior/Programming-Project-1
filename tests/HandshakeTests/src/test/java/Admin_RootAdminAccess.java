
import static org.junit.jupiter.api.Assertions.assertEquals;

import java.util.concurrent.TimeUnit;

import org.junit.jupiter.api.AfterAll;
import org.junit.jupiter.api.BeforeAll;
import org.junit.jupiter.api.MethodOrderer.OrderAnnotation;
import org.junit.jupiter.api.Order;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.TestMethodOrder;
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
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
		login = "s3591176", 
		rssToken = "{9E7D2EF1-F3F7-4BB0-A9E7-D9D078E305F9}", 
		projectId = 625
// following are OPTIONAL
// releaseId = 7, testSetId = 1)
)
@TestMethodOrder(OrderAnnotation.class) // << this annotation is for using @order, or adding order to my test-cases
public class Admin_RootAdminAccess {
	// define all your variables that you need to initialise through different tests
	private static ChromeDriver driver;
	private String expectedResult;
	private String actualResult;
	private WebElement element;
	private WebDriverWait wait;
	

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
	@SpiraTestCase(testCaseId = 16502)
	public void openAdminWebsite() {

		driver.get("http://handshake.test/admin");

		// Specifies the amount of time the driver should wait when searching
		// for an element if it is not immediately present. ( same as thread sleep but
		// in the right way)
		driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS); // << I asked wait maximum for 5 seconds for the next
		/*
		 * Another wait method:
		 * Sets the amount of time to wait for a page load to 
		 * complete before throwing an error.If the timeout is 
		 * negative, page loads can be indefinite.
		 * driver.manage().timeouts().pageLoadTimeout(time, unit)																// element
		 */

		expectedResult = "http://handshake.test/admin/login";
		actualResult = driver.getCurrentUrl();
		assertEquals(expectedResult, actualResult);

	}
    
	@Test
	@Order(2) // << the order of the test, so this test-case is running as second
	@SpiraTestCase(testCaseId = 16503)
	public void loginAsRootAdmin() {
		WebElement elementUser = driver.findElement(By.name("username"));
		elementUser.sendKeys("root");
		
		WebElement elementPass = driver.findElement(By.name("password"));
		elementPass.sendKeys("password");
		
		elementPass.submit();
		
		driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
		
		expectedResult = driver.findElement(By.id("admin")).getText();
		actualResult = "You are logged in as an ADMIN - Username: root";
		assertEquals(expectedResult, actualResult);
	}

	@AfterAll
	// closing or quitting the browser after the test
	public static void closeBrowser() {
		driver.close();
		// driver.quit();
	}
}
