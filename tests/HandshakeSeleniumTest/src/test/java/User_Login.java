
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

import com.inflectra.spiratest.addons.junitextension.SpiraTestConfiguration;

@SpiraTestConfiguration(
		// following are REQUIRED
		url = "https://rmit-university.spiraservice.net",
		login = "s3591176", 
		rssToken = "{9E7D2EF1-F3F7-4BB0-A9E7-D9D078E305F9}", 
		projectId = 625
// following are OPTIONAL
// releaseId = 7, testSetId = 1)
)

// 31 - As a Super Administrator I want to create other Administrators

@TestMethodOrder(OrderAnnotation.class) // << this annotation is for using @order, or adding order to my test-cases
public class User_Login {
	// define all your variables that you need to initialise through different tests
	private static ChromeDriver driver;
	private String expectedResult;
	private String actualResult;
	private WebElement element;
	private WebDriverWait wait;
	private WebElement notifcation;
	

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
	//@SpiraTestCase(testCaseId = 16502)
	public void openUserWebsite() {

		driver.get("http://handshake.test/");

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

		expectedResult = "http://handshake.test/";
		actualResult = driver.getCurrentUrl();
		assertEquals(expectedResult, actualResult);

	}
    
	@Test
	@Order(2)
	//@SpiraTestCase(testCaseId = 16503)
	public void goToLoginPage() {
		driver.findElement(By.id("login_user")).click();;
		
		expectedResult = "Job Seeker Login";
		actualResult = driver.findElement(By.xpath("//div[@class='panel-heading']")).getText();
		assertEquals(expectedResult, actualResult);
	}
	
	@Test
	@Order(3)
	//@SpiraTestCase(testCaseId = 16503)
	public void userLogin() {
		WebElement elementEmail = driver.findElement(By.name("email"));
		elementEmail.sendKeys("testaccount@fakeemail.com");
		
		WebElement elementPass = driver.findElement(By.name("password"));
		elementPass.sendKeys("password");	
		
		driver.findElement(By.xpath("//button[@type='submit']")).click();;
		
		driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
		
		expectedResult = "Jimmy Hoffer";
		actualResult = driver.findElement(By.xpath("//a[@id='userDropdown']")).getText();
		assertEquals(expectedResult, actualResult);
		
	}
	

	@AfterAll
	// closing or quitting the browser after the test
	public static void closeBrowser() {
		driver.close();
		// driver.quit();
	}
}
