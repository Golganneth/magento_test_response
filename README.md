Steps followed to refactor the code:
1.- Separate test code from business logic.
2.- Moved validation logic to its own class.
3.- Moved formatting logic out of the Magento\Report class
4.- Created new domain object for the Report class and a new service that performs the logic.

The goal from this refactor would be deprecate the Magento\Report class in favor of the domain object and the service to send the report. In order to do this, the next step would be replace the client calls to Magento\Report::sendReport by the call to the service Magento\Service\ReportSender::sendReport and the use Magento\Domain\Report instead of Magento\Report. Once this is done, we can remove the Magento\Report class. 
