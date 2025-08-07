pipeline {
  agent any
  triggers {
    pollSCM('* * * * *')  // Or rely on webhook (preferred)
  }
  stages {
    stage('Build') {
      steps {
        echo "Building branch ${env.BRANCH_NAME}"
        // Add your build commands
      }
    }
  }
}