ALTER TABLE complaints

ADD COLUMN id SERIAL PRIMARY KEY,
ADD COLUMN Date_received DATE,
ADD COLUMN Product VARCHAR,
ADD COLUMN Sub_product  VARCHAR,
ADD COLUMN Issue  VARCHAR,
ADD COLUMN Sub_issue  VARCHAR,
ADD COLUMN Consumer_complaint_narrative  VARCHAR,
ADD COLUMN Company_public_response  VARCHAR,
ADD COLUMN Company  VARCHAR,
ADD COLUMN State  VARCHAR,
ADD COLUMN ZIP_code  VARCHAR,
ADD COLUMN Tags  VARCHAR,
ADD COLUMN Consumer_consent_provided  VARCHAR,
ADD COLUMN Submitted_via  VARCHAR,
ADD COLUMN Date_sent_to_company DATE,
ADD COLUMN Company_response_to_consumer  VARCHAR,
ADD COLUMN Timely_response  VARCHAR,
ADD COLUMN Consumer_disputed  VARCHAR,
ADD COLUMN Complaint_ID  VARCHAR
