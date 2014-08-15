
Postcodify XE 모듈
==================

[Postcodify](http://postcodify.poesis.kr/) 새주소 우편번호 검색 프로그램을
XE에서 사용할 수 있도록 만든 모듈입니다. 기존의 `krzip` 공식 모듈을 대체하는 형태입니다.


장점
----

Postcodify는 XE에서 제공하는 `krzip` 공식 모듈에 비해 아래와 같은 장점이 있습니다.

- 지역을 별도로 선택하지 않아도 검색이 가능합니다.
- 도로명주소, 상세주소, 참고항목, 우편번호 입력란을 분리하여 정부 권고와 같은 순서로 배치합니다.
  (기존 모듈은 상세주소가 맨 마지막에 입력되어 우체부 아저씨가 싫어하십니다.)
- 팝업창에서 검색을 수행할 수 있습니다.


사용 방법
---------

1. 기존에 사용하던 `krzip` 모듈을 삭제하고, 관리 모듈에서 캐시를 재생성합니다.
2. 이 모듈의 `krzip` 폴더를 XE의 모듈 폴더로 복사합니다.
3. 회원가입 또는 회원정보 변경 페이지에서 평소처럼 우편번호 검색을 하시면 됩니다.
4. 모듈 설정 화면에서 검색서버의 주소, 지도 링크, 팝업창 사용, 지번주소 표시 여부 등을 선택할 수 있습니다.


커스터마이징
------------

Postcodify 검색 스크립트인 `search.min.js` 파일을 로딩하는 경로는
반드시 원본 그대로 사용하시기 바랍니다.
이 파일을 다른 경로에 복사하여 사용하실 경우 무료 API 서버와의 호환성이 떨어질 수 있습니다.

그 밖의 설정 변경은 Postcodify 공식 사이트의 매뉴얼을 참조하여
`tps/js/postcodify.js` 파일을 변경하시면 됩니다.


라이센스
--------

이 모듈은 XE의 공식 `krzip` 모듈을 바탕으로 작성하였으므로,
공식 모듈과 같이 LGPL 라이센스를 따릅니다.
