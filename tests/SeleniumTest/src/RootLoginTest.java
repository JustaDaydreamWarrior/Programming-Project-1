import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

public class RootLoginTest {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		System.setProperty("webdriver.chrome.driver", "chromedriver.exe");
		
		WebDriver driver = new ChromeDriver();
		
		driver.get("http://handshake.test/admin/");
		
		System.out.println(driver.getTitle());
		
		WebElement elementUser = driver.findElement(By.name("username"));
		elementUser.sendKeys("root");
		
		WebElement elementPass = driver.findElement(By.name("password"));
		elementPass.sendKeys("password");
		
		elementPass.submit();
		System.out.println("=======================");
		System.out.println(driver.getCurrentUrl());
	}

}
