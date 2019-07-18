# INSTRUCTIONS

- Develop with docker-compose up
- CI/CI Pipeline as follows:
1. feature branch
2. staging branch  PR To master.
3. Successful PR merge of master deploys code to ECS via Codepipeline

TO DO:

- Add env aware input artifacting
- Define stages for deployments
- Topic subscriptons for statuses
- Theme rewrite?
